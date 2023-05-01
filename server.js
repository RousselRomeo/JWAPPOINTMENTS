"use strict";


require("dotenv").config();
const express = require("express");
const app = express();

const mongoose = require("mongoose");
const bodyParser = require("body-parser");
const randomstring = require("randomstring");
const nodemailer = require("nodemailer");
//const flash = require("express-flash");
const flash = require("connect-flash");
const session = require("express-session");
const ejs = require("ejs");
const fs = require("fs");
const helper = require("./helper");
const cors = require("cors");

const path = require('path')
app.set('views','views')

app.set("view engine", "ejs");
app.use(cors())
//Express session middleware
app.use(
  session({
    secret: "happy dog",
    saveUninitialized: true,
    resave: true,
  })
);

//connect flash middleware
app.use(flash());

//Global variables
app.use(function (req, res, next) {
  res.locals.success_messages = req.flash("success");
  res.locals.error_messages = req.flash("error");
  res.locals.incorrect_password = req.flash("incorrectPassword");
  res.locals.user_isnotavailable = req.flash("error2");
  res.locals.email_notverified = req.flash("error3");
  res.locals.email_alreadyverified = req.flash("error4");
  res.locals.email_successfullyverified = req.flash("success2");
  res.locals.email_notverified2 = req.flash("error5");

  next();
});

app.use(
  bodyParser.urlencoded({
    extended: true,
  })
);

  app.use(express.static("public"));
//"mongodb+srv://process.env.MUNGODB_USER:process.env.PASSWORD@cluster0.mxzx2.mongodb.net/userDB"
//"mongodb://localhost:27017/FieldService"
mongoose.connect("mongodb+srv://roussel:tchatchou111@cluster0.mxzx2.mongodb.net/FieldService", {
  useNewUrlParser: true,
  useUnifiedTopology: true,
});

const userSchema = new mongoose.Schema({
  name: {
    type: String,
    //required: [true, "please specify name a name in the name field"],
  },
  name2: String,
  table1: { type: Boolean, default: false },
  table2: { type: Boolean, default: false },
  time: { type: String, default: "" },
  deleteButton: { type: Boolean, default: false },
});

const User = mongoose.model("Appoinment", userSchema);

app.get("/", function (req, res) {


  //res.sendFile(__dirname + "/public/login.html");
  res.render("login")
});

app.get("/logout", function (req, res) {
  const id = req.session.userId;
  if (!id) {
    //res.sendFile(__dirname + "/public/login.html");
    res.render("login");
  }
  
  //console.log(req.session);
  req.session.destroy(function (err) {
    if (err) {
      console.log(err);
    } else {
     // res.redirect("/");
     res.render("login")
    }
  });
});

//Register user

app
  .get("/register", function (req, res) {
    res.render("register");
  })
  .post("/register", function (req, res) {
    console.log("rrrrrrrrrr");
    const newUser = new User({
      name: req.body.userName,
      name2: req.body.userName,
    });

    User.findOne({ name: req.body.userName }, function (err, foundUser) {
      if (err) {
        console.log(err);
      } else if (!foundUser) {
        newUser.save(function (err) {
          if (err) {
            console.log(err);
          } else {
            req.flash(
              "success",
              "inscription réussi!"
            );
            //sendMail(newUser.name, newUser.secretToken);
            res.redirect("register");
          }
        });
      } else if (
        foundUser.password === req.body.password &&
        foundUser.active === true
      ) {
        req.flash("error2", "username already verified, Please! login");
        res.redirect("/register");
      } else if (foundUser) {
        req.flash("error5", "Username not verified! Please verify then login");
        res.redirect("/register");
      }
    });
  });

//user login
app.post("/login", async function (req, res) {
  const userName = req.body.userName;
  //const password = req.body.password;

 await User.updateMany({}, { $set: { deleteButton:false} });

  User.findOne({ name2: userName },  function (err, foundUser) {
    if (err) {
      console.log(err);
    }
    if (!foundUser) {
      req.flash(
        "error",
        "No user found with the specified name,Please Register!!"
      );
      //res.redirect("/");
      res.render("login")
    } else {
      //(foundUser.password === password && foundUser.playerName === "")
      //req.session.userId = foundUser._id;
      //res.render("playerName");
      // res.render("welcomePage", { playerName: foundUser.playerName });

      req.session.userId = foundUser._id;
      foundUser.deleteButton = true;
      foundUser.save();
      console.log(foundUser);

      console.log("testllll");
     

      //req.flash("incorrectPassword", "incorrect password,please Try again");
      //res.redirect("/");
    }
  });
  User.find({}).exec(function (err, foundUsers) {
    if (err) {
      console.log(err);
    } else {
      console.log("eomeooo");
      //res.sendFile(__dirname + "/public/welcomePage.html");
      res.render("welcomePage", {
        //playerhighestLevel: foundUser.time,
        foundUsers: foundUsers,helper:helper
      });

      //res.send(foundUsers);
    }
  });
}



);

app.post("/deleteAppointment", async function (req, res) {
  console.log("hellotesttttt");
  const { id } = JSON.parse(req.body.userId)

  console.log(id);
  const userId = req.session.userId;
  console.log(userId);
  if (id !== userId) return;
 
  await User.findOne({ _id: userId }, function (err, foundUser) {
    if (err) {
      console.log(err);
    } else {
      console.log("found id");
      foundUser.name = "";
      foundUser.time = "";
      foundUser.save();
      
   

    }
  });

  /* User.findByIdAndDelete(id, function (err) {
    if (err) console.log(err);
    console.log("Successful deletion");
  });*/
 
  //res.redirect("/login")


  await User.find({})
    .limit(10)
    .exec(function (err, foundUsers) {
      console.log(foundUsers);
      if (err) {
        console.log(err);
      } else {
        // res.send(foundUsers);
        res.render("welcomePage", { foundUsers: foundUsers });
      }
    });
});

app.post("/addAppointment",  async function (req, res) {
  console.log(helper)
  const { time } = req.body;
  console.log(time);

  const userId = req.session.userId;
  console.log(userId);
  await  User.findOne({ _id: userId }, async function (err, foundUser) {
    if (!foundUser) {
      //TODO
      return;
    }

    if (foundUser.name === "") {
      foundUser.name = foundUser.name2;
      // foundUser.save();
      console.log("adding no name");
    }
    if (foundUser.time === time && foundUser.table1 === true) {
      console.log("hello");
      
  await  User.find({}).exec(function (err, foundUsers) {
    console.log(foundUsers);
    if (err) {
      console.log(err);
    } else {
      console.log("table1");
      res.render("welcomePage", { foundUsers: foundUsers, helper:helper});
    }
  });
      
      
    } else {
      foundUser.time = time;
      foundUser.table2 = false;
      foundUser.table1 = true;
      foundUser.save();
      
    }

   
  });

});



app.post("/addAppointment2", function (req, res) {
  console.log("2ndtable");
  const { time } = req.body;
  console.log(time);
  // const userId = req.session.userId;

  const userId = req.session.userId;
  console.log(userId);
  User.findOne({ _id: userId },  function (err, foundUser) {
    if (!foundUser) {
      //TODO
   
    }

    if (foundUser.name === "") {
      foundUser.name = foundUser.name2;
      foundUser.save();
      console.log("adding no name");
    }
    if (foundUser.time === time && foundUser.table2 === true) {
      
  User.find({}).exec(function (err, foundUsers) {
    console.log(foundUsers);
    if (err) {
      console.log(err);
    } else {
      console.log("table1");
      res.render("welcomePage", { foundUsers: foundUsers, helper:helper});
    }
  });
      
    } else {
      foundUser.time = time;
      foundUser.table1 = false;
      foundUser.table2 = true;
      foundUser.save();
      console.log("table2")
      User.find({}).exec(function (err, foundUsers) {
          //console.log(foundUsers);
          if (err) {
            console.log(err);
          } else {
            res.render("welcomePage", { foundUsers: foundUsers });
          }
        });
    }

    console.log(foundUser);
    if (err) {
      console.log(err);
    } else {
      //console.log("hellllllo");
    }
  });
});

app.listen(process.env.PORT || 3000, function () {
  console.log("server is listenning at port 3000");
});
