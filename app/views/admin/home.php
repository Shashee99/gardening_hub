<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>
<h2>Registered users in the system.</h2>
<div class="userlist">

   <div class="barcontainer">
       <canvas id="userChart"></canvas>
       <script>

           var ctx = document.getElementById('userChart').getContext('2d');
           var userChart = new Chart(ctx, {
               type: 'bar',
               data: {
                   labels: ['Customers', 'Advisors', 'Sellers'],
                   datasets: [{
                       label: 'Number of Users',
                       data: [10, 20, 30],
                       backgroundColor: [
                           'rgba(54, 162, 235, 1)'
                       ],
                       borderColor: [

                           'rgba(54, 162, 235, 1)'

                       ],
                       borderWidth: 1
                   }]
               },
               options: {
                   scales: {
                       yAxes: [{
                           ticks: {
                               beginAtZero: true,
                               max: 50

                           }
                       }]
                   }
               }
           });
       </script>
   </div>

</div>

<div class="newcategoryreq">
    <div class="newcategoryreq-texts">
        <h3>New Category Requests</h3>
        <p><small>Category request form customers</small></p>
    </div>
    <h3>25</h3>
</div>

<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>

