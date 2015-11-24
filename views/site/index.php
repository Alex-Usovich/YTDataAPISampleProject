<div class="site-index">

    <div class="jumbotron">

        <h2>Youtube Data API Sample Project</h2>

        <p class="lead"></p>

        <p><a class="btn btn-lg btn-success" href="https://github.com/axeJustice/YTDataAPISampleProject">GitHub</a></p>
    </div>

    <div class="body-content">

        <div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#videosList" aria-controls="home" role="tab" data-toggle="tab">Videos List</a></li>
                <li role="presentation"><a href="#viewCountChart" aria-controls="profile" role="tab" data-toggle="tab">View Count Chart</a></li>
                <li role="presentation"><a href="#commentCountChart" aria-controls="messages" role="tab" data-toggle="tab">Comment Count Chart</a></li>
                <li role="presentation"><a href="#likeCountChart" aria-controls="settings" role="tab" data-toggle="tab">Like Count Chart</a></li>
                <li role="presentation"><a href="#dislikeCountChart" aria-controls="settings" role="tab" data-toggle="tab">Dislike Count Chart</a></li>
                <li role="presentation"><a href="#subscriberCountChart" aria-controls="settings" role="tab" data-toggle="tab">Subscriber Count Chart</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="videosList" style="max-height:400px; min-width:900px; overflow-y:scroll;">

                </div>
                <div role="tabpanel" class="tab-pane" id="viewCountChart">
                    <div id="chart_div"></div>
                </div>
                <div role="tabpanel" class="tab-pane" id="commentCountChart">
                    <div id="chart2_div"></div>
                </div>
                <div role="tabpanel" class="tab-pane" id="likeCountChart">
                    <div id="chart3_div"></div>
                </div>
                <div role="tabpanel" class="tab-pane" id="dislikeCountChart">
                    <div id="chart4_div"></div>
                </div>
                <div role="tabpanel" class="tab-pane" id="subscriberCountChart">
                    <div id="chart5_div"></div>
                </div>
            </div>

        </div>


</div>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="/assets/9882bc39/jquery.js"></script>
<script type="text/javascript">


    $(document).ready(

        function() {
            $('#myTabs a').click(function (e) {
                e.preventDefault();
                $(this).tab('show');
            });
        }
    );
    google.load('visualization', '1.0', {'packages':['corechart']});

    google.setOnLoadCallback(drawChart);

    function drawChart(){

        $.get("retrieve",
            function(result){

                var html = "";
                html += "<table class='table table-striped table-bordered table-hover' id='videoListTable'>";
                    html += "<thead><tr><th>Video Thumbnail</th><th>Video Title</th><th>Video Description</th><th>Channel Title</th><th>View Count</th><th>Comment Count</th><th>Like Count</th><th>Dislike Count</th><th>Subscribers Count</th></tr></thead>";
                    html += "<tbody>";
                        for(i = 0; i<result.length; i++){
                                html += "<tr>";
                                    html += "<td>";
                                    html += "<img src='"+result[i].video_thumbnail+"'/>";
                                    html += "</td>";
                                    html += "<td>";
                                        html += result[i].channel_title;
                                    html += "</td>";
                                    html += "<td>";
                                        html += result[i].video_title;
                                    html += "</td>";
                                    html += "<td>";
                                        html += result[i].video_description;
                                    html += "</td>";

                                    html += "<td>";
                                        html += result[i].views_count;
                                    html += "</td>";
                                    html += "<td>";
                                        html += result[i].comments_count;
                                    html += "</td>";
                                    html += "<td>";
                                        html += result[i].likes_count;
                                    html += "</td>";
                                    html += "<td>";
                                        html += result[i].dislikes_count;
                                    html += "</td>";
                                    html += "<td>";
                                        html += result[i].subscribers_count;
                                    html += "</td>";
                                html += "</tr>";
                        }
                    html += "</tbody>";
                html += "</table>";
                $("#videosList").html(html);

                // Create the data table.
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Topping');
                data.addColumn('number', 'View Count');

                for(i = 0; i<result.length; i++){
                    data.addRow([result[i].video_title, parseInt(result[i].views_count,10)]);
                }


                // Set chart options
                var options = {'title':'Top-5 YouTube Videos Comment Count',
                    'width':800,
                    'height':400};

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
                chart.draw(data, options);

                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Topping');
                data.addColumn('number', 'Comment Count');

                for(i = 0; i<result.length; i++){
                    data.addRow([result[i].video_title, parseInt(result[i].comments_count,10)]);
                }


                // Set chart options
                var options = {'title':'Top-5 YouTube Videos View Count',
                    'width':800,
                    'height':400};

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.BarChart(document.getElementById('chart2_div'));
                chart.draw(data, options);

                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Topping');
                data.addColumn('number', 'Like Count');

                for(i = 0; i<result.length; i++){
                    data.addRow([result[i].video_title, parseInt(result[i].likes_count,10)]);
                }


                // Set chart options
                var options = {'title':'Top-5 YouTube Videos Like Count',
                    'width':800,
                    'height':400};

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.BarChart(document.getElementById('chart3_div'));
                chart.draw(data, options);

                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Topping');
                data.addColumn('number', 'Dislike Count');

                for(i = 0; i<result.length; i++){
                    data.addRow([result[i].video_title, parseInt(result[i].dislikes_count,10)]);
                }


                // Set chart options
                var options = {'title':'Top-5 YouTube Videos Dislike Count',
                    'width':800,
                    'height':400};

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.BarChart(document.getElementById('chart4_div'));
                chart.draw(data, options);

                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Topping');
                data.addColumn('number', 'Subscriber Count');

                for(i = 0; i<result.length; i++){
                    data.addRow([result[i].video_title, parseInt(result[i].subscribers_count,10)]);
                }


                // Set chart options
                var options = {'title':'Top-5 YouTube Videos Subscriber Count',
                    'width':800,
                    'height':400};

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.BarChart(document.getElementById('chart5_div'));
                chart.draw(data, options);

            }
        );
    }
</script>
