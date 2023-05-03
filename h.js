app.post("/addAppointment",  async function (req, res) {

    const { time } = req.body;
  
  
    const userId = req.session.userId;
   console.log(userId);
    await  User.findOne({ _id: userId }, async function (err, foundUser) {
      if (!foundUser) {
        //TODO
       /* User.find({}).exec(function (err, foundUsers) {
      
          if (err) {
            console.log(err);
          } else {
            res.render("welcomePage", { foundUsers: foundUsers });
          }
        });*/
        return res.redirect("/addAppointment")
   
      }
   
   
  
  
      if (foundUser.name === "" || foundUser.name===null) {
        foundUser.name = foundUser.name2;
         foundUser.save();
        console.log("adding no name");
           
      return  res.redirect("/addAppointment")
        /*
     await  User.find({}).exec(function (err, foundUsers) {
        
          if (err) {
            console.log(err);
          } else {
            res.render("welcomePage", { foundUsers: foundUsers });
          }
        });*/
      }
  
  
  
      if (foundUser.time === time && foundUser.table1 === true) {
        console.log("hello");
        
    /*await  User.find({}).exec(function (err, foundUsers) {
  
      if (err) {
        console.log(err);
      } else {
        console.log("table1");
        res.render("welcomePage", { foundUsers: foundUsers, helper:helper});
      }
    });*/
    return  res.redirect("/addAppointment")
        
      } else {
        foundUser.time = time;
        foundUser.table2 = false;
        foundUser.table1 = true;
        foundUser.save();
  
       /* User.find({}).exec(function (err, foundUsers) {
         
          if (err) {
            console.log(err);
          } else {
            res.render("welcomePage", { foundUsers: foundUsers });
          }
        });*/
        return  res.redirect("/addAppointment")
        
      }
  
     
    });
  
  });