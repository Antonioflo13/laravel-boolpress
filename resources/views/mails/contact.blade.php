<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Message</title>
</head>
<body>
    <h1>Nuovo Messaggio</h1>
    <div>
        <h4>Nome</h4>
        <h4>{{ $lead->name }}</h4>
        <h4>E-mail</h4>
        <h4>{{ $lead->email }}</h4>
        <h4>Message</h4>
        <h4>{{ $lead->message }}</h4>
    </div>
</body>
</html>