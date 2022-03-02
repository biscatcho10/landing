<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!function_exists("gallery")) {
    function gallery($filename)
    {
        return asset("gallery/{$filename}");
    }
}
if (!function_exists('areActiveRoutes')) {
    function areActiveRoutes(array $routes, $output = "active")
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) return $output;
            if (str_contains($route, "*")) {
                $params = explode(".", $route);
                $currentRouteParams = explode(".", Route::currentRouteName());
                if ($params[0] == $currentRouteParams[0] && $params[1] == '*') return $output;
            }
        }
    }
}

if (!function_exists('currentRouteWithParams')) {
    /**
     * @param array $routes
     * @param array $params
     * @param array $values
     * @return bool
     */
    function currentRouteWithParams(array $routes, array $allParams = []): bool
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) return true;
            if (str_contains($route, "*")) {
                $params = explode(".", $route);
                $currentRouteParams = explode(".", Route::currentRouteName());
                if (empty($allParams)) {
                    if ($params[0] == $currentRouteParams[0] && $params[1] == '*') return true;
                } else {
                    $route = Route::current();
                    foreach ($allParams as $key => $param) {
                        if (!($route->hasParameter($key) && $route->parameter($key) == $param)) return false;
                        break;
                    }
                    if ($params[0] == $currentRouteParams[0] && $params[1] == '*') return true;
                }
            }
        }
        return false;
    }
}


if (!function_exists("title")) {
    /**
     * @param string $title
     * @return string
     */
    function title($title = ""): string
    {
        $site_name = env("SITE_NAME", "Landing Pages");
        if (isset($title) && $title != "") {
            return $site_name . " | " . $title;
        } else {
            $routeArray = app('request')->route()->getAction();
            $controllerAction = class_basename($routeArray['controller']);
            list($controller, $action) = explode('@', $controllerAction);
            $controller = str_replace("Controller", "", $controller);
            return $site_name . " | " . $controller;
        }
    }
}


if (!function_exists("changeEnvironmentVariable")) {
    function changeEnvironmentVariable($key, $value)
    {
        $path = base_path('.env');

        if (is_bool(env($key))) {
            $old = env($key) ? 'true' : 'false';
        } elseif (env($key) === null) {
            $old = 'null';
        } else {
            $old = env($key);
        }

        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                "$key=" . $old, "$key=" . $value, file_get_contents($path)
            ));
        }
    }
}

function changeEnv($data = array()): bool
{
    if (count($data) > 0) {

        // Read .env-file
        $env = file_get_contents(base_path() . '/.env');

        // Split string on every " " and write into array
        $env = preg_split('/\s+/', $env);;

        // Loop through given data
        foreach ((array)$data as $key => $value) {

            // Loop through .env-data
            foreach ($env as $env_key => $env_value) {

                // Turn the value into an array and stop after the first split
                // So it's not possible to split e.g. the App-Key by accident
                $entry = explode("=", $env_value, 2);

                // Check, if new key fits the actual .env-key
                if ($entry[0] == $key) {
                    // If yes, overwrite it with the new one
                    $env[$env_key] = $key . "=" . $value;
                } else {
                    // If not, keep the old one
                    $env[$env_key] = $env_value;
                }
            }
        }

        // Turn the array back to an String
        $env = implode("\n", $env);

        // And overwrite the .env with the new data
        file_put_contents(base_path() . '/.env', $env);

        return true;
    } else {
        return false;
    }
}

if (!function_exists("landingPageTypes")) {
    /**
     * @return string[]
     */
    function landingPageTypes(): array
    {
        return ['social', "branding", "motion", "mobile", "action"];
    }
}

if (!function_exists("composeEmail")) {
    function composeEmail(string $to, string $subject, string $message): bool
    {
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions
        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = env("MAIL_HOST");             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = env("MAIL_USERNAME");   //  sender username
            $mail->Password = env("MAIL_PASSWORD");       // sender password
            $mail->SMTPSecure = env("MAIL_ENCRYPTION");                  // encryption - ssl/tls
            $mail->Port = env("MAIL_PORT");                          // port - 587/465
            $mail->setFrom(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));
            $mail->addAddress($to);
            $mail->isHTML(true);                // Set email content format to HTML
            $mail->Subject = $subject;
            $mail->Body = $message;
            if ($mail->send()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
}


if (!function_exists("checkType")) {
    function checkType($type)
    {
        if (!in_array($type, landingPageTypes())) return abort(404);;
        return true;
    }
}
