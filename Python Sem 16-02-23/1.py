def password(key):
    flag = True
    if len(key) < 10:
        flag = False
    #atleast a number and special characters########################################
    list=[]
    numcount = 0
    specialcount = 0
    for i in range(len(key)):
        list.append(key[i])
    for i in list:
        if i in ['1','2','3','4','5','6','7','8','9','0']:
            numcount = numcount + 1
    for i in list:
        if(i in ['!','@','#','%','^','&','*','(',')']):
            specialcount = specialcount + 1
    if specialcount < 3:
        flag = False
    if numcount == 0:
        flag = False
    #atleast two upper case and two lower case######################################
    uppercount = 0
    lowercount = 0
    for i in list:
        if(i.upper()==i):
            uppercount = uppercount + 1
        if(i.lower()==i):
            lowercount = lowercount + 1
    if(uppercount < 2):
        flag = False
    if(lowercount < 2):
        flag = False
    # flag check ##################################################################
    if(flag==True):
        print("Valid Password")
    else:
        print("Invalid Password")
passs=input("Enter your password")
password(passs)
