

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script>

</script>
<div class="site-index">

    <div class="jumbotron">

        <h2>Youtube Data API Sample Project</h2>

        <p class="lead"></p>

        <p><a class="btn btn-lg btn-success" href="https://github.com/axeJustice/YTDataAPISampleProject">GitHub</a></p>
    </div>

    <div class="body-content">

        <div>
	    <p><button class="btn btn-lg btn-primary" onclick="funcRefreshData();">Update data manually</button></p>
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
