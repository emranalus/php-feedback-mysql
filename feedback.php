<?php

    require 'inc/header.php';

    // Uses sql query to fetch data from feedback table in db.
    $sql = 'SELECT * FROM feedback';
    if (isset($conn)) {
        $results = mysqli_query($conn, $sql);
        $feedback = mysqli_fetch_all($results, MYSQLI_ASSOC);   // MYSQLI_ASSOC for associated array as output.
    }

?>

    <h2>Feedback</h2>
    <p class="lead text-center">Print every feedback from db each being one card.</p>

    <?php if(empty($feedback)): ?>
        <p class="lead mt3">There is no feedback.</p>
    <?php endif; ?>

    <!-- Print every row in table one by one. -->
    <?php foreach($feedback as $item): ?>
        <div class="card my-3 w-75">
          <div class="card-body">
              <?php echo $item['body']; ?>
              <div class="text-secondary mt2">
                  By <?php echo $item['name']; ?>
              </div>
          </div>
        </div>
    <?php endforeach; ?>

<?php require 'inc/footer.php'; ?>
