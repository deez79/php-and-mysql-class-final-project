php-and-mysql-class-final-project
=================================

################################################################

	PHP and MySQL class final project
		Derek Schulman 
		December 2013
		code@derekisthecoolest.com

################################################################

Requirements:

	1. Create a database with at least 3 tables
	2. Call to the database
	3. Use Sessions or Cookies

Idea:

	Create a database of James Bond Films, actors, directors,
	and characters	(probably not fully complete).  
	Create a user login page.
		Allow logged in users either access to additional content,
		or allow them to edit.
	Create a message board area that populates from the db.	

Source:

	Will be relying heavily on PHP and MySQL for Dynamic Web Sites,
		Fourth Edition by Larry Ullman.  Chapter 17 deals with creating
		a message board, and chapter 18 deals with logins and
		 registration.  Chapter 12 of the book deals with session and 
		 cookies, and will also be utalized.

Final Rundown:

	My overall idea/goal was partially met:
	 	What I ended up doing was significantly less then planned, 
	 	and also significantly	harder.  I ended up using both 
	 	cookies and sessions for the project, which in the end 
	 	is really just a message board.  I wanted to use cookies 
	 	to log in, which I was able to do.  I decided to use sha1
	 	hashing for the user_id value for the cookie, which lead 
	 	to it's own issue...  the cookie value could no longer be 
	 	used for user_id in the db. Because I wasn't makeing a multi-
	 	lingual database, I had to do a lot of code tweaking, in the end, 
	 	this was the biggest time sink.  Because I had no default
		language id, or lang_id, or lid as the book continued to reference, I 
		was trying to replace them all with forum_id or fid.  I am now aware
		that this caused me to miss the part about the structure of the 
		message board.  The dropdown only selects language, not forum area.
		I used the twitter bootstrap for css, and then spent zero time implementing
		it.

	Further work: 
		I would like to have added a way to add user registration (chapter 18),
		but I was under a time constraint.

	Final Thought:
		This class helped me to learn the basics of php and mySQL, as well
		as git and github.  	
