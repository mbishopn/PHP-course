<!DOCTYPE html>
<?php include './db_functions/airbnb.php';

?>
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
            display: flex;
            flex-direction:column;
            align-items:center;
            font-family: "Gill sans", sans-serif;
            font-weight: bolder;
        }
        form{
          width:300px;
          margin-top:25px;
          margin-bottom:25px;
        }
        form * {
          width:90%;
        }
        input{
          height:25px;
          font-size:23px;
        }
        select, button{
          height:35px;
          font-size:23px;
          margin: 5px 0px 5px;
          width:93%;
        }
        h1{font-size:35px;font-weight:bold;margin:5px 0px;}
        h2{font-size:30px;font-weight:bold;margin:2px 0px;}
        h3{font-size:28px;font-weight:bolder;margin:0px 0px;}
        .filter {
          align-self:flex-start;
        }
        .filter select,button{
          font-size:18px;
        }
        .frame{
          display:inherit;
          border: solid 3px green;
          padding: 15px;
          box-sizing: content-box;
          width:85%;
          justify-content:center;
          margin-top:25px;

        }
        .btn{
          position: absolute;
          left:85%;
          top:1em;
          width:fit-content;
          background-color:black;
          color:white;
        }
         .listing{
          display: flex;
          flex-direction:column;
          border:solid 3px lightblue;
          margin:1em 0px;
          padding: 15px;
          font-weight:normal;
          width:95%;
        }
        .listing form {
          display:flex;
          flex-direction:column;
          margin-top:30px;
          align-self:end;
        }
        .noRooms{
          border: solid 3px red;
          padding:5%;
          text-align: center;
          height:150px;
          font-size:25px;
          margin-top:25px;
        }
        .noParams{
          border: solid 3px yellow;
          padding:5%;
          height:150px;
          font-size:25px;
          margin-top:25px;
        }
        .results{
          top: 3.5em;
          margin:15px;
          font-size:25px;
          align-self:start;
        }
        .bookBtn{
          width: 70px;
          align-self:flex-end;
          background-color:green;
          color:white;
          border-radius:50%;
        }
        .confirmation{
          display:flex;
          flex-direction:column;
          align-self:center;
          align-items:center;
        }
        .confirmation div{
          margin:2em;
          font-weight:normal;
          border:solid green 2px;
          padding: 1em;
        }
        span{
          color:yellow;
          font-weight:bolder;
        }
    </style>
  </head>
  <body>