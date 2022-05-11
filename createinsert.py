import os
planes = os.listdir(os.getcwd()+"/planes")
data = []

print('INSERT INTO planes (id,name, dir) VALUES')
for index, plane in enumerate(planes):
    name = plane.split('-')
    name[-1] = name[-1].split('.')
    print("("+name[1]+",'"+" ".join(name[2:-1]), name[-1][0]+"', '"+plane +"')",end='')
    if index != len(planes)-1:
        print(',')
print(';')