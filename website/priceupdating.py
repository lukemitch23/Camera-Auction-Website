import mysql.connector

db = mysql.connector.connect(
    host="localhost",
    user="server",
    passwd=("server123"),
    database="site"
)

mycursor = db.cursor()

mycursor.execute("SELECT * FROM sold")
soldresult = mycursor.fetchall()
for x in soldresult:
    make = x[0]
    print(make)
    model = x[1]
    print(model)
    price = x[2]
    print(price)
    stringprice = str(price)
    sql = "SELECT * FROM prices WHERE make = '" + make + "' AND model = '" + model + "'"
    print(sql)
    mycursor.execute(sql)
    pricesresult = mycursor.fetchall()
    print(pricesresult)
    if pricesresult == []:
        insertsql = "INSERT INTO prices (make, model, recprice) VALUES ('" + make + "','" + model + "','" + stringprice + "')"
        print(insertsql)
        mycursor.execute(insertsql)
    else:
        priceretrievalsql = "SELECT recprice FROM prices WHERE make = '" + make + "' AND model = '" + model + "'"
        print(priceretrievalsql)
        mycursor.execute(priceretrievalsql)
        priceresult = mycursor.fetchall()
        print(priceresult)
        currentprice = priceresult[0]
        currentprice = str(currentprice)
        currentprice = currentprice.replace("(", "")
        currentprice = currentprice.replace(")", "")
        currentprice = currentprice.replace(",", "")
        currentpriceint = int(currentprice)
        xprice = x[2]
        xpriceint = int(xprice)
        newprice = (currentpriceint + xpriceint) / 2
        newprice = str(newprice)
        updatesql = "UPDATE prices SET recprice = ' " + newprice + "' WHERE make = '" + make + "' AND model = '" + model + "'"
        print(updatesql)
        
        mycursor.execute(updatesql)

db.commit()

db.close()



