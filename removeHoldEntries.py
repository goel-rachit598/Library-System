import MySQLdb
import datetime
db = MySQLdb.connect(host="localhost", user="root",passwd="",db="project")
cur = db.cursor()
cur.execute("SELECT * FROM hold_book")
for row in cur.fetchall():
    print(row[0])
    print(row[1])
    print(row[2])
    holdTime = str(row[2])
    currentTime = str(datetime.datetime.now())
    print(holdTime[8:10])
    print(currentTime[8:10])
    query = "DELETE FROM hold_book WHERE id="+str(row[0])+" AND isbn="+str(row[1])
    print(query)
    if holdTime[8:10] == currentTime[8:10]:
    	if holdTime[11:13]!=currentTime[11:13]:
    		print(query)
    		cur.execute(query)
    		db.commit()
    else:
    	cur.execute(query)
    	db.commit()
    	print(query)
