import random
import time 

def main():
    print("Welcome to the elf game")
    input("Press ENTER to continute: ")
    time.sleep(1)
	for i in range(0,24):
		game(elftotal, money, i)
	print("Thank you for playing the game")
	quit()

def game(elftotal,money,day):
	near, far, forest = elfnum(elftotal, day)
	weather = weather(day)
	money = money(weather,near,far,forest)
	print(f"The weather today was: {weather}")




def elfnum(elftotal, day):
	near = int(input("Enter the number of elves for the near forest: "))
	far = int(input("Enter the number of elves for the far forest: "))
	if day > 17:
		forest = int(input("Enter the number of elves for the far far away forest: "))
		if near + far + forest != elftotal:
			print("You have not assigned the correct number of elves")
			elfnum(elftotal, day)
		else:
			return near, far, forest
	else:
		if near + far != elftotal:
			print("Incorrect number of elves assigned!")
			elfnum(elftotal, day)
		else return near, far, 0


def weather(day):
	num = random.randint(1,6)
	if num >= 4:
		print("Todays weather is a blizard")
		return "blizard"
	else:
		print("Todays weather is sunny")
		return "sunny"

def money(weather, near, far, forest):
	if weather == "sunny":
		money += near * 10
		money += far * 20
		money += forest * 50
	else:
		money += near * 10
	return money
