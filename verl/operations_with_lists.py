from subprocess import call
from platform import system
from getpass import getpass
from time import sleep  # TODO: Implement it where I see fit.
from typing import Tuple

so = system()


def limpar_tela():
	if so == 'Windows':
		_ = call('cls', shell=True)
	else:
		_ = call('clear', shell=True)


def colorir_string(rgb: Tuple[int, int, int], s: str, to_print: bool = True):
	r, g, b = rgb
	string_colorida = f"\033[38;2;{r};{g};{b}m{str(s)}\33[m"
	
	if to_print:
		print(string_colorida)

	return string_colorida


limpar_tela()


def alg1():
	"""Faça um programa que inicialize uma lista de compras com 5 itens
	diferentes e exiba todos utilizando um laço de repetição."""
	lista_compras = ["acetona", "fósforos", "nafta de petróleo", "metilamina", "iodo"]

	r = b = 200
	g = 0
 
	for item in lista_compras:
		colorir_string((r, g, b), f" - {item}")
		r -= 15
		b -= 25


def alg2():
	"""Faça um programa que inicialize uma lista com os valores de 1 até 10 e
	depois exiba apenas os números pares."""
	listinha = list(range(1, 11))

	b = g = 200
	r = 0

	for num in listinha:
		if num % 2 == 0:
			s1 = '   ' if len(str(num)) == 1 else '  '
			s2 = '   '
			colorir_string((r, g, b), f" -<|{s1}{num}{s2}|>- ")
			b -= 15
			g -= 25


def alg3():
	"""Escreva um programa que leia 10 números de reais e informe:
	a) a soma de todos os elementos.
	b) a média dos elementos.
	c) o maior e o menor elemento.
	d) a quantidade de elementos positivos e a quantidade de elementos
	negativos."""
	lista_reais = []

	print("Insira 10 números reais, como 3.14 ou -12.3 por exemplo.")

	for i in range(10):
		inp = input("> ")
		inp = inp.replace(',', '.')

		try:
			inp = float(inp)
		except ValueError:
			colorir_string((255, 0, 0), "Essa entrada não é válida!")

		lista_reais.append(inp)

	soma = sum(lista_reais)
	colorir_string((138, 43, 226), f"Soma: {soma}")
	print()

	media = soma / len(lista_reais)
	colorir_string((255, 191, 0), f"Média: {media}")
	print()

	maior, menor = max(lista_reais), min(lista_reais)

	maior = colorir_string((255, 69, 0), f"Maior: {maior}", False)
	menor = colorir_string((135, 206, 250), f"Menor: {menor}", False)

	print(maior, menor, sep='\n')
	print()

	positivos = len([num for num in lista_reais if num > 0])
	negativos = len([num for num in lista_reais if num < 0])
	neutros = len([num for num in lista_reais if num == 0])

	positivos = colorir_string((0, 255, 0), f"Positivos: {positivos}", False)
	negativos = colorir_string((255, 20, 147), f"Negativos: {negativos}", False)
	neutros = colorir_string((255, 250, 250), f"Neutros: {neutros}", False)

	print(positivos, negativos, neutros, sep='\n')

def alg4():
	"""Escreva um programa que receba uma lista de 10 inteiros via teclado,
	em seguida o programa deve solicitar um número e informar se o
	número também está na lista ou não."""
	lista_inteiros = []

	print("Insira 10 números inteiros, como 589678435603489785 ou -4 por exemplo.")

	for i in range(10):
		inp = input("> ")

		try:
			inp = int(inp)
		except ValueError:
			colorir_string((255, 0, 0), "Essa entrada não é válida!")

		lista_inteiros.append(inp)

	num = input("Insira um número:\n> ")
	num = int(num)

	if num in lista_inteiros:
		print(f"O número {num} está presente na lista.")
	else:
		print(f"O número {num} não está presente na lista.")
	print("...")


def alg5():
	"""Faça um programa que inicialize uma lista vazia e a preencha com 5
	nomes diferentes digitados pelo usuário, depois disso solicite um nome e
	remova-o da lista."""
	lista = []

	print("Digite 5 nomes: ")

	for i in range(5):
		nome = input("> ").title()
		lista.append(nome)

	nome = input("Insira um nome pra removê-lo da lista, mas escolhe um nome feio pra tirar, não tira um dos nomes bonitos, por favor:\n> ")
	if nome in lista:
		lista.remove(nome)
		print(f'O nome "{nome}" foi removido da lista, olha só:')
		print(lista)
		print("Viu, ele não tá mais na lista.")
	else:
		print(f"Esse nome ({nome}) nem tava na lista...")


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
		getpass(colorir_string((255, 221, 0), '\nPressione ENTER para continuar...', False))
	except:
		getpass(colorir_string((255, 0, 0), "ERRO FATAL!!!", False))

