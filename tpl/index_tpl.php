<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Todo List</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
  <!-- font style css -->
  <link rel="stylesheet" href="assets/css/font-style.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="assets/css/bootstrap-to-do-list.min.css" />
  <link rel="stylesheet" href="assets/css/graid.css">
  <link rel="stylesheet" href="assets/css/index.css">

</head>

<body>

  <!-- Start your project here-->
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card" id="list1" style="border-radius: .75rem; background-color: #eff1f2;">
            <div class="card-body py-4 px-4 px-md-5">
              <p class="h1 text-center mt-3 mb-4 pb-3 ">
                TODO LIST PAGE
              </p>
              <!-- satrt add folder -->
              <div class="pb-2">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row align-items-center">
                      <input type="text" class="form-control form-control-lg" id="addNewFolderInput" placeholder="Add new folder...">
                      <div>
                        <button type="button" class="btn btn-primary" id="addBtnNewFolder">Add</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end add folder -->
              <!-- start visite folders -->
              <section class="container" >
                  <div class="row  d-f">
                    <div class="col-xs-2 col-s-2 col-md-2 col-l-2 col-xl-2 <?= empty($_GET['folder_id']) ? 'active' : '' ?>" >
                      <a href="?folder_id=0">
                        <i class="fa fa-folder folders"></i>
                        <p class="name-folder ">All</p>
                      </a>
                    </div>
                  </div>

                <?php foreach($folder_data as $key => $valuse): ?>
                  <div class="row d-f">
                    <div class="col-xs-2 col-s-2 col-md-2 col-l-2 col-xl-2  <?= !empty($_GET['folder_id']) && $_GET['folder_id'] ==$valuse['id'] ? 'active' : ''; ?>" >
                      <a href="?folder_id=<?= $valuse['id']; ?>">
                        <i class="fa fa-folder folders"></i>
                        <p class="name-folder"><?= $valuse['name']; ?></p>
                        <a href="?delete_folder=<?= $valuse['id'] ; ?>" onclick="return confirm('are you sure to delete folder name = <?= $valuse['name']; ?> ?');"><i class="fas fa-trash-alt delete_folder"></i></a>
                      </a>
                    </div>
                  </div>
                  <?php endforeach ; ?>    
                </section>
                <!-- end visite folders --> 
                <hr class="my-4 col-xs-12 col-s-12 col-md-12 col-l-12 col-xl-12"> 
                <!-- start add task -->
                <div class="d-flex justify-content-end align-items-center mb-4 pt-2 pb-3" style="margin: 0 auto;"> 
                <div class="pb-2">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-row align-items-center">
                        <input type="text" class="form-control form-control-lg" id="addTaskNewInput" placeholder="Add new Task...">
                        <a href="#!" data-mdb-toggle="tooltip" title="Set due date"></a>
                        <div>
                          <button type="button" id="addBtnNewTask" class="btn btn-primary">Add</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>   
              <!-- end add task -->
              <div class="task-list">
              <?php if( sizeof($task_data) > 0 ): ?>
                <?php foreach ($task_data as $key => $value) : ?>
                  <ul class="list-group list-group-horizontal rounded-0 bg-transparent">
                    <li class="list-group-item d-flex align-items-center ps-0 pe-3 py-1 rounded-0 border-0 bg-transparent">
                      <div class="form-check" id="checkIsDone"> 
                        <i data-taskId="<?= $value['id'] ?>" class="idDone  <?= $value['is_done']?'fas fa-check-square checkbox-style':'fas fa-check-square checkbox-stylee' ?>"></i>
                      </div>
                    </li>
                    <li class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent">
                      <p class="lead fw-normal mb-0 <?= $value['is_done'] ? 'text-dec-in': '' ?> " id="title_list"><?= $value['title'] ;?></p>
                    </li>
                    <li class="list-group-item ps-3 pe-0 py-1 rounded-0 border-0 bg-transparent">
                      <div class="d-flex flex-row justify-content-end mb-1">
                        <a href="update.php?update_task=<?= $value['id'] ;?>" class="text-info" data-mdb-toggle="tooltip" title="Edit todo"><i class="fas fa-pencil-alt me-3"></i></a>
                        <a href="?delete_task=<?= $value['id'] ; ?>" class="text-danger" data-mdb-toggle="tooltip" title="Delete todo" onclick="return confirm('are you sure to delete task ?');"><i class="fas fa-trash-alt"></i></a>
                      </div>
                      <div class="text-end text-muted">
                        <a href="#!" class="text-muted" data-mdb-toggle="tooltip" title="Created date">
                          <p class="small mb-0"><i class="fas fa-info-circle me-2"></i><?= $value['created_at'] ; ?></p></a>
                      </div>
                    </li>
                  </ul>
                <?php endforeach ; ?>
              <?php else : ?>
                <p>folder is empty please add task ... </p>
              <?php endif ; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End your project here-->
  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
  <!-- jquery cdn -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function(){
      //add folder to page  
      $('#addBtnNewFolder').click(function(e){
        var input = $('input#addNewFolderInput') ;
        $.ajax({
          url : 'process/ajax_handler.php',
          method : 'post',
          data : {action:'addFolder',folderName:input.val()},
          success : function(response){
            if (response=='1') {
              location.reload() ;
            }else{
              alert(response) ;
            }
          }
        });
      }) ;
       //add task to page  
       $('#addBtnNewTask').click(function(e){
        var inputTask = $('input#addTaskNewInput') ;
        $.ajax({
          url : 'process/ajax_handler.php',
          method : 'post',
          data : {action:'addTask',folderId : <?= $_GET['folder_id']; ?>,taskTitle:inputTask.val()},
          success : function(response){
            if (response=='1') {
              location.reload() ;
            }else{
              alert(response) ;
            }
          }
        });
      }) ;
      // ajax done and is done
      $('.idDone').click(function(){
        var tId = $(this).attr('data-taskId') ;
        $.ajax({
          url : 'process/ajax_handler.php',
          method : 'post',
          data : {action:'doneSwitch',taskId : tId },
          success : function(response){
              location.reload() ;
          }
        });
      });
    }) ;
  </script>
</body>
</html>