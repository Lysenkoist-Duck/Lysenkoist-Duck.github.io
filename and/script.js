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
		options: ['AI Model', 'Automation Script', 'Game Development', 'All answers are correct'],
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
		answer: 'lambda x: x ** 0.5',
	},
	{
		question: 'Who\'s the father of Python?',
		options: ['Guido van Rossum', 'Gido van Rossum', 'Guido von Rossum', 'Guido van Rössum'],
		answer: 'Guido van Rossum',
	},
	{
		question: 'How do you handle errors in Python?',
		options: [
			`<pre style="font-family: 'Poppins', sans-serif; display: flex; justify-content: center; width: 230px; padding: 10px; margin-top: 10px; background-color: #7B68EE; border-radius: 5px; margin-bottom: 5px;">try:
	code
except:
	fallback code</pre>`,

			`<pre style="font-family: 'Poppins', sans-serif; display: flex; justify-content: center; width: 230px; padding: 10px; margin-top: 10px; background-color: #7B68EE; border-radius: 5px; margin-bottom: 5px;">attempt:
	code
else:
	fallback code</pre>`,

			`<pre style="font-family: 'Poppins', sans-serif; display: flex; justify-content: center; width: 230px; padding: 10px; margin-top: 10px; background-color: #7B68EE; border-radius: 5px; margin-bottom: 5px;">try:
	code
else:
	fallback code</pre>`,

			`<pre style="font-family: 'Poppins', sans-serif; display: flex; justify-content: center; width: 230px; padding: 10px; margin-top: 10px; background-color: #7B68EE; border-radius: 5px; margin-bottom: 5px;">attempt:
	code
except:
	fallback code</pre>`,
		],
		answer: `<pre style="font-family: 'Poppins', sans-serif; display: flex; justify-content: center; width: 230px; padding: 10px; margin-top: 10px; background-color: #7B68EE; border-radius: 5px; margin-bottom: 5px;">try:
	code
except:
	fallback code</pre>`,
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
let processedAnswers = [];


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

		// if the current question is the one about handling errors in Python
		if (currentQuestion == 8) {
			// The line below ensures HTML code will be parsed.
			option.innerHTML = shuffledOptions[i];  // Good stuff!
			option.appendChild(radio);
			optionsElement.appendChild(option);
		}
		else {
			const optionText = document.createTextNode(shuffledOptions[i]);

			option.appendChild(radio);
			option.appendChild(optionText);
			optionsElement.appendChild(option);
		}
	}

	quizContainer.innerHTML = '';  // Cleaning it from the previous questions.
	quizContainer.appendChild(questionElement);
	quizContainer.appendChild(optionsElement);
}


function checkAnswer() {
	const selectedOption = document.querySelector('input[name="quiz"]:checked');

	// This if ensures an option has been marked before processing the input
	if (selectedOption) {
		const answer = selectedOption.value;
		if (answer === quizData[currentQuestion].answer) {
			score++;
		}

		processedAnswers.push({
			question: quizData[currentQuestion].question,
			chosenAnswer: answer,
			correctAnswer: quizData[currentQuestion].answer,
		});
		
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
	quizContainer.style.display = 'none';  // Hides the quiz container
	submitButton.style.display = 'none';  // Hides the "submit" button
	retryButton.style.display = 'inline-block';  // Displays the "retry" button
	showAnswerButton.style.display = 'inline-block';  // Displays the "show answer" button
	resultContainer.innerHTML = `You scored ${score} out of ${quizData.length}!`;
}


function retryQuiz() {
	quizContainer.style.display = 'block';  // Displays the quiz container
	submitButton.style.display = 'inline-block';  // Displays the "submit" button
	retryButton.style.display = 'none';  // Hides the "retry" button
	showAnswerButton.style.display = 'none';  // Hides the "show answer" button
	resultContainer.innerHTML = '';  // Erases the previous result

	currentQuestion = 0;  // Resets the question counter, setting the quiz back to the start
	score = 0;  // Resets the score
	processedAnswers = [];  // Erases the wrong answers
	displayQuestion();  // Starts the quiz again
}


function showAnswer() {
	quizContainer.style.display = 'none';  // Hides the quiz container
	submitButton.style.display = 'none';  // Hides the "submit" button
	showAnswerButton.style.display = 'none';  // Hides the "show answer" button
	retryButton.style.display = 'inline-block';  // Displays the "retry" button

	/* TODO: Make an if below,
	if there are no wrong answers,
	then a congratulations message should appear on top as well.
	Maybe such message should always appear,
	and just vary slightly regarding the score/max score ratio.*/
	let processedAnswersHTML = '';
	for (let i = 0; i < processedAnswers.length; i++) {

		if (processedAnswers[i].chosenAnswer == processedAnswers[i].correctAnswer) {
			processedAnswersHTML += `
			<p style="color: green">
			<strong>Question:</strong> ${processedAnswers[i].question}<br>
			<strong>Your Answer:</strong> ${processedAnswers[i].chosenAnswer}<br>
			<strong>Correct Answer:</strong> ${processedAnswers[i].correctAnswer}
			</p>
			`;
		}
		else {
			processedAnswersHTML += `
			<p style="color: red">
			<strong>Question:</strong> ${processedAnswers[i].question}<br>
			<strong>Your Answer:</strong> ${processedAnswers[i].chosenAnswer}<br>
			<strong>Correct Answer:</strong> ${processedAnswers[i].correctAnswer}
			</p>
			`;
		}
	}

	resultContainer.innerHTML = `
	<p>You scored ${score} out of ${quizData.length}!</p>
	<p>Your Answers:</p>
	${processedAnswersHTML}
	`;
}


// Links the buttons to their respective function
submitButton.addEventListener('click', checkAnswer);
retryButton.addEventListener('click', retryQuiz);
showAnswerButton.addEventListener('click', showAnswer);

displayQuestion();  // Starts the quiz loop
