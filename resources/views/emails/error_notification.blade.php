<!DOCTYPE html>
<html>
<head>
    <title>Error Notification</title>
</head>
<body>
    <h1>An error occurred in your application</h1>
    <p><strong>Exception Message:</strong> {{ $exception->getMessage() }}</p>
    <p><strong>File:</strong> {{ $exception->getFile() }}</p>
    <p><strong>Line:</strong> {{ $exception->getLine() }}</p>
    <p><strong>Stack Trace:</strong></p>
    <pre>{{ $exception->getTraceAsString() }}</pre>
</body>
</html>
