<?php
function buildNestedHierarchy($input_json) {
    // Decode the JSON string to a PHP array
    $data = json_decode($input_json, true);

    // Initialize an empty array to hold the hierarchy
    $hierarchy = [];
    $stack = [];

    foreach ($data as $item) {
        // Simplify the item structure based on the desired output
        $newNode = [
            "id" => $item["id"],
            "level" => $item["attributes"]["level"],
            "children" => []
        ];

        // While the stack is not empty and the last item on the stack has a level greater or equal to the current one
        while (!empty($stack) && $stack[count($stack) - 1]["level"] >= $newNode["level"]) {
            array_pop($stack);
        }

        // If the stack is not empty, add the current node as a child of the last item in the stack
        if (!empty($stack)) {
            $stack[count($stack) - 1]["children"][] = $newNode;
            // Push the reference of the child into the stack for potential nested children
            $stack[] = &$stack[count($stack) - 1]["children"][count($stack[count($stack) - 1]["children"]) - 1];
        } else {
            // If the stack is empty, it means this is a root node (level 1)
            $hierarchy[] = $newNode;
            $stack[] = &$hierarchy[count($hierarchy) - 1];
        }
    }

    // Return the hierarchical structure as JSON
    return json_encode($hierarchy, JSON_PRETTY_PRINT);
}

// sample input json
$input_json = '[
    {"id": 1, "attributes": {"level": 1}},
    {"id": 2, "attributes": {"level": 2}},
    {"id": 3, "attributes": {"level": 3}},
    {"id": 4, "attributes": {"level": 2}},
    {"id": 5, "attributes": {"level": 1}},
    {"id": 6, "attributes": {"level": 2}},
    {"id": 7, "attributes": {"level": 3}}
]';

// replace $input_json with desired data
echo buildNestedHierarchy($input_json);
