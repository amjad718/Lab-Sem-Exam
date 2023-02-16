mainlist = ['amjad',123,['apple',2,'orange'],{'name':'amjad'},{'d', 'a', 'j', 'm'},('a', 'm', 'j', 'a', 'd')]
f = open("file.txt","w")
f.write(str(mainlist))

# #list comprehension

stringval = [x for x in mainlist if type(x)==str]
str_file = open("strfile.txt","w")
str_file.write(str(stringval))
str_file.close()


intval = [x for x in mainlist if type(x)==int]
int_file = open("intfile.txt","w")
int_file.write(str(intval))
int_file.close()


        
listval = [x for x in mainlist if type(x)==list]
list_file = open("listfile.txt","w")
list_file.write(str(listval))
list_file.close()


dictval = [x for x in mainlist if type(x)==dict]
dict_file = open("dictfile.txt","w")
dict_file.write(str(dictval))
dict_file.close()


setval = [x for x in mainlist if type(x)==set]
set_file = open("setfile.txt","w")
set_file.write(str(setval))
set_file.close()


tupleval = [x for x in mainlist if type(x)==tuple]
tuple_file = open("tuplefile.txt","w")
tuple_file.write(str(tupleval))
tuple_file.close()

f.close()

