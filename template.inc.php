<?php
if (!isset($notes)) die("Do not access this file directly!");
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title> Simple Note </title>
        
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Code+Pro">
        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css">
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
        <style type="text/css">
            .container {
                max-width: 680px;
            }
            
            textarea {
                resize: vertical;    /* allow only vertical stretch */
                font: .9em "Source Code Pro", monospace;
            }
        </style>
    </head>
    
    <body>
        
        <div class="container">
            <h1>Simple Note</h1>
            <hr>
            
            <div class="page-header">
                <h2> Send a new note </h2>
            </div>
            
            <form role="form" action="index.php" method="POST">
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Title" name="title" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="12" placeholder="What do you have in mind ?" name="content" autofocus required></textarea>
                </div>
                <div class="btn-group pull-right">
                    <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span> Clear </button>
                    <button class="btn btn-success" name="new" type="submit"><span class="glyphicon glyphicon-send"></span> Send </button>
                </div>
            </form>
        </div>
        <?php

if (!empty($notes->fetchNotes())):
    $notes = $notes->fetchNotes();
    
?>
    <div class="container" id="notes">
        <div class="page-header">
            <h2> Previously sent </h2>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Time</th>
                            <th>Date</th>
                            <th class="pull-right">Actions<br></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
<?php foreach ($notes as $row): ?>
                            <td>
                                <!--<small><?= htmlspecialchars(substr($row['title'], 0, 15), ENT_QUOTES, 'UTF-8') ?></small>-->
                                <small><?= htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8') ?></small>
                            </td>
                            <td><?= date('H:i', strtotime($row['created'])) ?></td>
                            <td><?= date('Y-m-d', strtotime($row['created'])) ?></td>
                            <td class="pull-right">
                                <div class="btn-group">
                                    <a class="btn btn-default btn-xs" title="Edit this note" href="#" data-toggle="modal" data-target="#<?= $row['ID'] ?>"><span class="glyphicon glyphicon-edit"></span></a>
                                    <a class="btn btn-danger btn-xs" title="Delete this note" onclick="deleteNote(<?= $row['ID'] ?>)"><span class="glyphicon glyphicon-trash"></span></a>
                                    <a class="btn btn-info btn-xs" title="Download this note" href="?dl=<?= $row['ID'] ?>" target="_blank"><span class="glyphicon glyphicon-download-alt"></span></a>
                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="<?= $row['ID'] ?>" role="dialog">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Edit note</h4>
                                </div>
                                <div class="modal-body">
                                  <form role="form" action="index.php" method="POST">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Title" name="title" value="<?= htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8') ?>">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="12" placeholder="What do you have in mind ?" name="content" required><?= htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8') ?></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="id" value="<?= $row['ID'] ?>">
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-success" name="edit" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Save </button>
                                    </div>
                                </div>
                                </form>
                              </div>
                            </div>
                        </div>
<?php endforeach; ?>
                    </tbody>
            </table>
        </div>
<?php endif; ?>
        </div>
        
        <footer class="container text-center">
            <hr>
            <p>
                <a href="logout.php" class="btn btn-secondary">Logout</a>
            </p>
            <p>
                <a href="https://github.com/ArtyumX/Simple-Note" target="_new">Simple-Note on Github</a><br>
                Copyright © 2017 <a href="https://github.com/ArtyumX">Artyum</a> &middot;
                Copyright © 2017-2018 <a href="https://malte70.de" rel="me nofollow">malte70</a>
            </p>
        </footer>
        
        <script type="text/javascript">
            function deleteNote(id){
                if (confirm('Are you sure you want to delete this note?')) {
                    window.location = '?del='+id;
                }
            }
        </script>
    </body>
</html>
