<script>
var quiz_code = "<?=$_GET['c']?>";
</script>

<div id="quiz-wrapper" class="main-wrapper" ng-app="quiz" ng-controller="QuizCtrl">
	<div class="container">
		<div class="message-wrapper">
			<div class="messages">
				<p><?=$message?></p>
				<p>Ți-am pregătit o mică surpriză, dar mai întâi, te rugăm sa ne spui câteva lucruri despre tine.</p>
			</div>
		</div>
		<div class="quiz">
			<ul class="quiz-nav">
				<li ng-repeat="question in questions track by $index" ng-class="{active: $index <= quizIndex}">{{$index + 1}}</li>
			</ul>
			<div class="question">
				<p>{{activeQuestion.question}}</p>
				<ul class="answers">
					<li ng-repeat="answer in activeQuestion.answers track by $index">
						<input type="radio" name="quiz[{{quizIndex}}]" ng-model="activeQuestion.answer" value="{{$index}}" ng-change="selectAnswer()" id="quiz-{{quizIndex}}-{{$index}}">
						<label for="quiz-{{quizIndex}}-{{$index}}">{{answer}}</label>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="quiz-result hide">
	<div>
		<img src="<?=base_url('static/img/ecard-test.jpg')?>" alt="" class="ecard">
		<p>Am creat special pentru tine, un mesaj pe care să-l transmiți colegilor și celor dragi, cu ocazia revederii.</p>
	</div>
</div>
