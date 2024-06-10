<!DOCTYPE html>
<?php require ('./data/rooms.php'); ?>
<!-- this is the header -->
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lab #5</title>
    <style type="text/css">
        body {
            background-color: #000;
            color: #FFF;
        }
        .frame{
          border: solid 3px green;
          padding: 3px;
        }
        .btn{
          position: absolute;
          left:85%;
          top:1.5em;
        }
         .listing{
          display: flex;
          flex-direction:column;
          border:solid 3px lightblue;
          margin:1em 0px;
          padding: 0px 5px 5px;
        }
        .listing form input{
          background-color:blue;
          color: white;
        }
        .noRooms{
          border: solid 3px red;
          text-align: center;
        }
        .noParams{
          border: solid 3px yellow;
        }
        .results{
          position: absolute;
          top: 2.5em;
        }
        .bookBtn{
          width: 70px;
          align-self:flex-end;
        }
    </style>
  </head>
  <body>