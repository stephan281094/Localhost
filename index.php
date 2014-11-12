<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>127.0.0.1</title>
    <link rel="stylesheet" href="main.css">
    <script src="sorttable.js"></script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li class="logo">
                    <a href="/#/">127.0.0.1</a>
                </li>
                <li>
                    <a href="./phpMyAdmin/">PhpMyAdmin</a>
                </li>
                <li>
                    <a href="/#/phpinfo">PHP Info</a>
                </li>
            </ul>
        </nav>
    </header>
    <section id="projects">
        <table class="sortable">
            <thead>
                <tr>
                    <th>Project Name</th>
                    <th>Date Modified</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $myDirectory = opendir(".");

                while($entryName = readdir($myDirectory))
                {
                    $dirArray[] = $entryName;
                }

                closedir($myDirectory);
                $indexCount = count($dirArray);
                $hideItems = array(".", "..", ".DS_Store", "index.php", "main.css", "sorttable.js");

                for($index = 0; $index < $indexCount; $index++)
                {
                    if(!in_array($dirArray[$index], $hideItems))
                    {
                        $name = $dirArray[$index];
                        $modtime = date("M j Y g:i A", filemtime($dirArray[$index]));
                        $timekey = date("YmdHis", filemtime($dirArray[$index]));

                        if($name != "index.php" && $name != "main.css" && $name != "sorttable.js")
                        {
                            print("
                                <tr onclick=\"document.location.href = 'http://$name/';\" class='$class'>
                                    <td>$name</td>
                                    <td sorttable_customkey='$timekey'>$modtime</td>
                                </tr>
                            ");
                        }
                    }
                }
            ?>
          </tbody>
        </table>
        <a href="/#/create" class="button">New Project</a>
    </section>
</body>
</html>
