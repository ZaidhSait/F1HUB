<!DOCTYPE html>
<html>
<head>
    <title>Discussion Forum</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        
        header {
            background-color: #333;
            color: white;
            padding: 20px;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-weight: normal;
            margin-top: 0;
        }
        
        form label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            resize: vertical;
        }
        
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .topic {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .topic h3 {
            margin-top: 0;
        }
        
        .topic p {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <header>
        <center>
          <h1>F1 HUB Open world Forum</h1>
      </center>
    </header>

    <div class="container">
        <h2>Create a new discussion topic</h2>
        <form method="post">
            <label for="topic">Topic:</label>
            <input type="text" name="topic" required>
            <br><br>
            <label for="content">Content:</label>
            <textarea name="content" required></textarea>
            <br><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    <?php
    // If user submits a new discussion topic
    if(isset($_POST["submit"])){
        $topic = $_POST["topic"];
        $content = $_POST["content"];
        $created_at = date("Y-m-d H:i:s");

        // Append new topic to text file
        $file = fopen("topics.txt", "a");
        fwrite($file, "$topic,$content,$created_at\n");
        fclose($file);

        echo "<p>Your topic has been posted!</p>";
    }

    // Get all topics from text file
    $topics = [];
    if(file_exists("topics.txt")){
        $file = fopen("topics.txt", "r");
        while(!feof($file)){
            $line = fgets($file);
            $topic = explode(",", $line);
            if(count($topic) == 3){
                $topics[] = [
                    "topic" => $topic[0],
                    "content" => $topic[1],
                    "created_at" => $topic[2]
                ];
            }
        }
        fclose($file);
    }

    // Display recent topics
    if(count($topics) > 0){
        echo "<h2>Recent Topics</h2>";
        foreach($topics as $topic){
            echo "<h3>{$topic["topic"]}</h3>";
            echo "<p>On {$topic["created_at"]}</p>";
            echo "<p>{$topic["content"]}</p>";
        }
    }
    ?>
</body>
</html>
