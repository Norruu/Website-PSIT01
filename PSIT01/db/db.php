<?php
/**
 * Database Connection using PDO
 * This file handles all database connections
 */

// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'PSIT01_db');
define('DB_USER', 'root');
define('DB_PASS', '');

// Create PDO connection
try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [
            PDO:: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch(PDOException $e) {
    // Log error and show user-friendly message
    error_log("Database Connection Error: " . $e->getMessage());
    die("Sorry, we're experiencing technical difficulties. Please try again later.");
}

/**
 * Helper function to execute queries
 */
function query($sql, $params = []) {
    global $pdo;
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    } catch(PDOException $e) {
        error_log("Query Error: " . $e->getMessage());
        return false;
    }
}

/**
 * Helper function to get all rows
 */
function fetchAll($sql, $params = []) {
    $stmt = query($sql, $params);
    return $stmt ?  $stmt->fetchAll() : [];
}

/**
 * Helper function to get single row
 */
function fetchOne($sql, $params = []) {
    $stmt = query($sql, $params);
    return $stmt ? $stmt->fetch() : null;
}

/**
 * Helper function to get single value
 */
function fetchColumn($sql, $params = []) {
    $stmt = query($sql, $params);
    return $stmt ? $stmt->fetchColumn() : null;
}

/**
 * Helper function to insert data
 */
function insert($table, $data) {
    global $pdo;
    $columns = implode(', ', array_keys($data));
    $placeholders = ':' . implode(', :', array_keys($data));
    
    $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
    
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        return $pdo->lastInsertId();
    } catch(PDOException $e) {
        error_log("Insert Error: " . $e->getMessage());
        return false;
    }
}

/**
 * Helper function to update data
 */
function update($table, $data, $where, $whereParams = []) {
    global $pdo;
    $set = [];
    foreach($data as $key => $value) {
        $set[] = "$key = :$key";
    }
    $set = implode(', ', $set);
    
    $sql = "UPDATE $table SET $set WHERE $where";
    
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array_merge($data, $whereParams));
        return $stmt->rowCount();
    } catch(PDOException $e) {
        error_log("Update Error: " . $e->getMessage());
        return false;
    }
}

/**
 * Helper function to delete data
 */
function delete($table, $where, $params = []) {
    $sql = "DELETE FROM $table WHERE $where";
    $stmt = query($sql, $params);
    return $stmt ? $stmt->rowCount() : 0;
}
?>