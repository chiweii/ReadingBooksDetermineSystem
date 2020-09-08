repli = input('what is your favorite programming language? ')
# print('your favorite programming language is '+ ans)

try:
	if(repli == 'python'):
		print('p');
	elif(repli == 'php'):
		print('php');
except Exception as e:
	print(e);
