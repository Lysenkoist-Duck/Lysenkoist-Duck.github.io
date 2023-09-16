from subprocess import call
from platform import system
from getpass import getpass

so = system()


def limpar_tela():
	if so == 'Windows':
		_ = call('cls', shell=True)
	else:
		_ = call('clear', shell=True)


def rgb(r, g, b, s):
	return f"\033[38;2;{r};{g};{b}m{str(s)}\33[m"


limpar_tela()


def alg1():
	pass


def alg2():
	pass


def alg3():
	pass


def alg4():
	pass


def alg5():
	pass


dici = {1: alg1, 2: alg2, 3: alg3, 4: alg4, 5: alg5}

while True:
	limpar_tela()
	inp = input("Insira o algarismo correspondente ao algoritmo desejado, insira \"q\" para sair do programa: ").lower()

	if inp.isnumeric():
		inp = int(inp)
	elif not inp:
		continue
	elif inp == 'q':
		quit()

	try:
		dici[inp]()
		getpass(colorir_string('\nPressione ENTER para continuar...', 'amarelo'))
	except:
		getpass(colorir_string("ENTRADA INVÁLIDA!!!", 'vermelho'))

