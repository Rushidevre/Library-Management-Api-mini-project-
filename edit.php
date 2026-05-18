<?php
include 'db.php';
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $sql=$conn->prepare('select * from bookrec where bookid=?');
    $sql->bind_param('i',$id);
    $sql->execute();
    $user=$sql->get_result()->fetch_assoc();
}
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $booktitle=$_POST['booktitle'];
    $authorname=$_POST['authorname'];
    $genre=$_POST['genre'];
    $totalcopies=$_POST['totalcopies'];
    $availablecopies=$_POST['availablecopies'];
    $sql=$conn->prepare('update bookrec set booktitle=?,authorname=?,genre=?,totalcopies=?,availablecopies=? where bookid=?');
    $sql->bind_param('ssssii',$booktitle,$authorname,$genre,$totalcopies,$availablecopies,$id);
    if ($sql->execute()) {
        header('location:home.php');
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
            <!-- place navbar here -->
        </header>
        <main>
            <h2 class="text-center my-5">You want to Edit?</h2>
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
                            value="<?=$user['booktitle']?>"
                        />
                       
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Author Name</label>
                        <textarea class="form-control" name="authorname" id=""><?=$user['authorname']?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Genre</label>
                        <input
                            type="text"
                            class="form-control"
                            name="genre "
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                            value="<?=$user['genre']?>"
                        />
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Total Copies</label>
                        <input
                            type="number"
                            class="form-control"
                            name="totalcopies"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                            value="<?=$user['totalcopies']?>"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Available Copies</label>
                        <input
                            type="number"
                            class="form-control"
                            name="availablecopies"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                            value="<?=$user['availablecopies']?>"
                        />
                    </div>  
                    <button
                        type="submit"
                        class="btn btn-primary"
                        href="home.php"
                    >
                        Submit
                    </button>
</div>
                    
                    
                    
                    
                </form>
            </div>
            
        </main>
        <footer>
            
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
