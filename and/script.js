const quizData = [
	{
	question: 'What is the best language in the world?',
	options: ['Python', 'C/C++', 'Java', 'Kotlin'],
	answer: 'Python',
	},
	{
	question: 'Why it\'s Python?',
	options: ['Dynamic Typing', 'Simple Syntax', 'Huge Community', 'All answers are correct'],
	answer: 'All answers are correct',
	},
	{
	question: 'Which of the following you can do with Python?',
	options: ['AI Model', 'Automation Script', 'Game', 'All answers are correct'],
	answer: 'All answers are correct',
	},
	{
	question: 'What are some disadvantages of Python?',
	options: [
		'May require additional code from a low level language for best performance',
		'Difficulty to Learn/Use',
		'Low Speed',
		'Python has no disadvantages'
	],
	answer: 'May require additional code from a low level language for best performance',
	},
	{
	question: 'Which of these companies use Python?',
	options: [
		'Google',
		'Facebook/Meta',
		'Amazon',
		'All answers are correct',
	],
	answer: 'All answers are correct',
	},
	{
	question: 'What is the correct Python file type?',
	options: ['python', 'pt', 'ipy', 'py'],
	answer: 'py',
	},
	{
	question: 'What is the correct preferred way to define an anonymous function in Python that solves square root?',
	options: [
		'lambda x: x ** 0.5',
		'from math import sqrt',
		'lambda x: x 1/2',
		'anon_func x: x ** 0.5',
	],
	answer: 'lambda x: x + 1',
	},
	{
	question: 'Who\'s the father of Python?',
	options: ['Guido van Rossum', 'Gido van Rossum', 'Guido von Rossum', 'Guido van Rössum'],
	answer: 'Guido van Rossum',
	},
	{
	question: 'How do you handle exceptions in Python?',
	options: [
		`try: code
		except: fallback code`,
		'attempt: code else: fallback code',
		'try: code else: fallback code',
		'attempt: code except: fallback code',
	],
	answer: 'try:\n\tcode\nexcept:\n\tfallback code',
	},
	{
	question: 'Which is the correct keyword for defining a function in Python?',
	options: ['def', 'func', 'function', 'define'],
	answer: 'def',
	},
];

const quizContainer = document.getElementById('quiz');
const resultContainer = document.getElementById('result');
const submitButton = document.getElementById('submit');
const retryButton = document.getElementById('retry');
const showAnswerButton = document.getElementById('showAnswer');

let currentQuestion = 0;
let score = 0;
let incorrectAnswers = [];

function shuffleArray(array) {
	for (let i = array.length - 1; i > 0; i--) {
	const j = Math.floor(Math.random() * (i + 1));
	[array[i], array[j]] = [array[j], array[i]];
	}
}

function displayQuestion() {
	const questionData = quizData[currentQuestion];

	const questionElement = document.createElement('div');
	questionElement.className = 'question';
	questionElement.innerHTML = questionData.question;

	const optionsElement = document.createElement('div');
	optionsElement.className = 'options';

	const shuffledOptions = [...questionData.options];
	shuffleArray(shuffledOptions);

	for (let i = 0; i < shuffledOptions.length; i++) {
	const option = document.createElement('label');
	option.className = 'option';

	const radio = document.createElement('input');
	radio.type = 'radio';
	radio.name = 'quiz';
	radio.value = shuffledOptions[i];

	const optionText = document.createTextNode(shuffledOptions[i]);

	option.appendChild(radio);
	option.appendChild(optionText);
	optionsElement.appendChild(option);
	}

	quizContainer.innerHTML = '';
	quizContainer.appendChild(questionElement);
	quizContainer.appendChild(optionsElement);
}

function checkAnswer() {
	const selectedOption = document.querySelector('input[name="quiz"]:checked');
	if (selectedOption) {
	const answer = selectedOption.value;
	if (answer === quizData[currentQuestion].answer) {
		score++;
	} else {
		incorrectAnswers.push({
		question: quizData[currentQuestion].question,
		incorrectAnswer: answer,
		correctAnswer: quizData[currentQuestion].answer,
		});
	}
	currentQuestion++;
	selectedOption.checked = false;
	if (currentQuestion < quizData.length) {
		displayQuestion();
	} else {
		displayResult();
	}
	}
}

function displayResult() {
	quizContainer.style.display = 'none';
	submitButton.style.display = 'none';
	retryButton.style.display = 'inline-block';
	showAnswerButton.style.display = 'inline-block';
	resultContainer.innerHTML = `You scored ${score} out of ${quizData.length}!`;
}

function retryQuiz() {
	currentQuestion = 0;
	score = 0;
	incorrectAnswers = [];
	quizContainer.style.display = 'block';
	submitButton.style.display = 'inline-block';
	retryButton.style.display = 'none';
	showAnswerButton.style.display = 'none';
	resultContainer.innerHTML = '';
	displayQuestion();
}

function showAnswer() {
	quizContainer.style.display = 'none';
	submitButton.style.display = 'none';
	retryButton.style.display = 'inline-block';
	showAnswerButton.style.display = 'none';

	let incorrectAnswersHtml = '';
	for (let i = 0; i < incorrectAnswers.length; i++) {
	incorrectAnswersHtml += `
		<p>
		<strong>Question:</strong> ${incorrectAnswers[i].question}<br>
		<strong>Your Answer:</strong> ${incorrectAnswers[i].incorrectAnswer}<br>
		<strong>Correct Answer:</strong> ${incorrectAnswers[i].correctAnswer}
		</p>
	`;
	}

	resultContainer.innerHTML = `
	<p>You scored ${score} out of ${quizData.length}!</p>
	<p>Incorrect Answers:</p>
	${incorrectAnswersHtml}
	`;
}

submitButton.addEventListener('click', checkAnswer);
retryButton.addEventListener('click', retryQuiz);
showAnswerButton.addEventListener('click', showAnswer);

displayQuestion();