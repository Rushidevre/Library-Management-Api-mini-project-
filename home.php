<?php
include 'db.php';
$result=$conn->query('select * from bookrec');
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $bookid=$_POST['bookid'];
    $booktitle=$_POST['booktitle'];
    $authorname=$_POST['authorname'];
    $genre=$_POST['genre'];
    $totalcopies=$_POST['totalcopies'];
    $availablecopies=$_POST['availablecopies'];
    $sql=$conn->prepare('insert into bookrec(bookid,booktitle,authorname,genre,totalcopies,availablecopies) values (?,?,?,?,?,?)');
    $sql->bind_param('isssii',$bookid,$booktitle,$authorname,$genre,$totalcopies,$availablecopies);
    if ($sql->execute()) {
        header('location:dashboard.php');
    }
}

?>

<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>

        <header>
            
            <nav
            class="navbar navbar-expand-sm navbar-light bg-light"
            >
            <div class="container">
                <a class="navbar-brand" href="#"><h1>Helloo <?php echo $_SESSION['usern'] ?></h1></a>
                <button
                    class="navbar-toggler d-lg-none"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId"
                    aria-controls="collapsibleNavId"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                      
                        
                       
                    </ul>
                    <form class="d-flex my-2 my-lg-0">
                       
                        <a
                            name=""
                            id=""
                            class="btn btn-outline-success paddingleft-right"
                            href="logout.php"
                            role="button"
                            >Add Book</a
                        >
                        
                    </form>
                    <br>
                    <br>
                    <br>
                    <form class="d-flex my-2 my-lg-0">
                       
                        <a
                            name=""
                            id=""
                            class="btn btn-outline-danger"
                            href="logout.php"
                            role="button"
                            >Logout</a
                        >
                        
                    </form>
                </div>
            </div>
         </nav>
        

        
        </header>
        <main>
            <h2 class="text-center my-5" >Add Book</h2>
            <div
                class="container my-5 border col-4 p-5 shadow"
            >
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Book Title</label>
                        <input
                            type="text"
                            class="form-control"
                            name="booktitle"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                       
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Author Name</label>
                        <textarea class="form-control" name="authorname" id="" ></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Genre</label>
                        <textarea class="form-control" name="genre" id="" ></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Total Copies</label>
                        <textarea class="form-control" name="totalcopies" id=""></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Available Copies</label>
                        <textarea class="form-control" name="availablecopies" id="" ></textarea>
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Submit
                    </button>

                        
                    </div>
                    
                    
                    
                    
                    
                    
                </form>
            </div>
            

            <div
                class="container"
            >
                <div
                    class="table-responsive rounded"
                >
                    <table
                        class="table table-primary "
                    >
                        <thead>
                            <tr>
                                <th scope="col">Book Id</th>
                                <th scope="col">Book Title</th>
                                <th scope="col">Author Name</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Total Copies</th>
                                <th scope="col">Available Copies</th>
                                <th scope="col">Action</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row=$result->fetch_assoc()){ ?>
                            <tr>
                                <td><?= $row['bookid']?></td>
                                <td><?= $row['booktitle']?></td>
                                <td><?= $row['authorname']?></td>
                                <td><?= $row['genre']?></td>
                                <td><?= $row['totalcopies']?></td>
                                <td><?= $row['availablecopies']?></td>
                                <td><a
                                    name=""
                                    id=''
                                    class="btn btn-primary"
                                    href="edit.php?id=<?=$row['bookid']?>"
                                    role="button"
                                    >Edit</a
                                >
                                </td>
                                <td><a
                                    name=""
                                    id=''
                                    class="btn btn-danger"
                                    href="delete.php?id=<?=$row['bookid']?>"
                                    role="button"
                                    >Delete</a
                                >
                                </td>
                            </tr>
                           <?php } ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
            
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
