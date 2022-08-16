<?php

class TaskController
{
    public function processRequest(string $method, ?string $id): void
    {
        if ($id === null) {

            if ($method == "GET") {

                echo json_encode("index");
            } elseif ($method == "POST") {

                echo json_encode("create");
            } else {

                $this->respondMethodNotAllowed("GET, POST");
            }
        } else {

            switch ($method) {

                case "GET":
                    echo json_encode("show $id");
                    break;

                case "PATCH":
                    echo json_encode("update $id");
                    break;

                case "DELETE":
                    echo json_encode("delete $id");
                    break;

                default:
                    $this->respondMethodNotAllowed("GET, PATCH, DELETE");
            }
        }
    }

    private function respondMethodNotAllowed(string $allowed_methods): void
    {
        http_response_code(405);
        header("Allow: $allowed_methods");
    }
}
