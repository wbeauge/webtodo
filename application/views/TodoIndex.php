
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>
            <?php echo $title; ?>
        </title>
    </head>
    <body>
        <h1>
            Mes tâches
        </h1>
          <p><?php echo "Vous avez ".$count." taches"; ?></p>
          <p><?php echo "Il vous manque ".$countfait." taches a faire"; ?></p><br>
          
        <?php foreach($todos as $todo): ?>
            <?php if($todo['completed']==1){ ?>
        
            <?php echo $todo['id']; ?>
            <?php echo $todo['completed']; ?>
        <s>
            <?php echo $todo['task']; ?>
        </s>
        
            <a href= <?php echo base_url('ToDo/pas_Fait/').$todo['id'] ?>> Pas Fait ?</a>
            <a href= <?php echo base_url('ToDo/modifier/').$todo['id'] ?>> Modifier ?</a>
            <a href= <?php echo base_url('ToDo/supprimer/').$todo['id'] ?>> Supprimer</a><br>
            <?php 
            }           
            else { 
            ?>                                                              
            
            <?php echo $todo['id']; ?>
            <?php echo $todo['completed']; ?>
            <?php echo $todo['task']; ?>
            <a href= <?php echo base_url('ToDo/fait/').$todo['id'] ?>>Fait?</a>
            <a href= <?php echo base_url('ToDo/modifier/').$todo['id'] ?>> Modifier ?</a>
            <a href= <?php echo base_url('ToDo/supprimer/').$todo['id'] ?>> Supprimer</a><br>                
            
            <?php }
                ?>
        
        <?php endforeach; ?>
        <a href=<?php echo base_url('ToDo/add/') ?>>Ajouter</a><br>
        <a href=<?php echo base_url('ToDo/reordonner/') ?>>Réordonner les taches</a><br>
            
    </body>               
</html>

