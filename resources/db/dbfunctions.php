<?php
require_once '../mainfunctions.php';

function connect_db()
{
	$arr = [
		'hostname' => 'localhost',
		'username' => 'root',
		'password' => '',
		'database' => 'accountsdb'
	];
	return mysqli_connect(...$arr);
}

function disconnect_db($connection)
{
	return mysqli_close($connection);
}

function table_exists(string $table)
{
	$conn = connect_db();
	$query = 'SHOW TABLES LIKE ?;';
	$stmt = $conn->prepare($query);
	$stmt->bind_param('s', $table);
	$stmt->execute();
	$result = $stmt->get_result();
	$stmt->close();
	disconnect_db($conn);
	return $result->num_rows == 1;
}

function insert(string $table, array $values)
{
	$query = "INSERT INTO $table";
	if (is_string(key($values))) {
		$query .= '(' . implode(', ', array_keys($values)) . ')';
	}
	$size = count($values);
	$query .= ' VALUES(' . str_repeat('?, ', $size - 1) . '?);';
	$types = str_repeat('s', $size);

	$conn = connect_db();
	$stmt = $conn->prepare($query);
	$stmt->bind_param($types, ...array_values($values));
	$result = $stmt->execute();
	$stmt->close();
	disconnect_db($conn);

	return $result;
}

function update(string $table, array $update_fields, array $where_fields)
{
	$keys = [];
	foreach (array_keys($update_fields) as $key) {
		$keys[$key] = '?';
	}
	$query = "UPDATE $table SET " . implode_keys_values(', ', $keys);
	if ($where_fields != []) {
		$keys = [];
		foreach (array_keys($where_fields) as $key) {
			$keys[$key] = '?';
		}
		$query .= ' WHERE ' . implode_keys_values(' and ', $keys);
	}
	$query .= ';';

	$values = array_merge(
		array_values($update_fields),
		array_values($where_fields)
	);
	$types = str_repeat('s', count($values));

	$conn = connect_db();
	$stmt = $conn->prepare($query);
	$stmt->bind_param($types, ...$values);
	$result = $stmt->execute();
	$stmt->close();
	disconnect_db($conn);

	return $result;
}

function select(string $table, array $select_fields = [], array $where_fields = [])
{
	$query = 'SELECT ';
	if ($select_fields != []) {
		$query .= implode(', ', $select_fields);
	} else {
		$query .= '*';
	}
	$query .= " FROM $table";
	if ($where_fields != []) {
		$keys = [];
		foreach (array_keys($where_fields) as $key) {
			$keys[$key] = '?';
		}
		$query .= " WHERE " . implode_keys_values(' and ', $keys);
	}
	$query .= ';';

	$conn = connect_db();
	$stmt = $conn->prepare($query);
	if ($where_fields != []) {
		$types = str_repeat('s', count($where_fields));
		$stmt->bind_param($types, ...array_values($where_fields));
	}
	$stmt->execute();
	$result = $stmt->get_result();
	$stmt->close();
	disconnect_db($conn);

	return $result;
}
