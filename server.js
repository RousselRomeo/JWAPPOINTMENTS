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

app.set("view engine", "ejs");

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
//"mongodb+srv://procees.env.MUNGODB_USER:process.env.PASSWORD@cluster0.mxzx2.mongodb.net/userDB"
//""
mongoose.connect("mongodb://localhost:27017/FieldService", {
  useNewUrlParser: true,
  useUnifiedTopology: true,
});

const userSchema = new mongoose.Schema({
  name: {
    type: String,
    required: [true, "please specify name a name in the name field"],
  },
  time: { type: String, default: "" },
});

const User = mongoose.model("Appoinment", userSchema);

app.get("/", function (req, res) {
  res.sendFile(__dirname + "/public/login.html");
});

app.get("/logout", function (req, res) {
  //console.log(req.session);
  req.session.destroy(function (err) {
    if (err) {
      console.log(err);
    } else {
      res.redirect("/");
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
              "Registration successful! Please verify your email"
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
app.post("/login", function (req, res) {
  const userName = req.body.userName;
  //const password = req.body.password;

  User.findOne({ name: userName }, function (err, foundUser) {
    if (err) {
      console.log(err);
    }
    if (!foundUser) {
      req.flash(
        "error",
        "No user found with the specified name,Please Register!!"
      );
      res.redirect("/");
    } else {
      //(foundUser.password === password && foundUser.playerName === "")
      //req.session.userId = foundUser._id;
      //res.render("playerName");
      // res.render("welcomePage", { playerName: foundUser.playerName });

      req.session.userId = foundUser._id;
      User.find({})
        .limit(10)
        .exec(function (err, foundUsers) {
          if (err) {
            console.log(err);
          } else {
            //res.sendFile(__dirname + "/public/welcomePage.html");
            /* res.render("welcomePage", {
                playerhighestLevel: foundUser.time,
                foundUsers: foundUsers,
              });*/
            res.send(foundUsers);
          }
        });

      //req.flash("incorrectPassword", "incorrect password,please Try again");
      //res.redirect("/");
    }
  });
});

app.post("/deleteAppointment", function (req, res) {
  console.log("hello");
  const { id } = req.body;
  console.log(id);
  const userId = req.session.userId;

  User.findByIdAndDelete(id, function (err) {
    if (err) console.log(err);
    console.log("Successful deletion");
  });

  User.find({})
    .limit(10)
    .exec(function (err, foundUsers) {
      if (err) {
        console.log(err);
      } else {
        res.send(foundUsers);
      }
    });
});

app.post("/addAppointment", function (req, res) {
  const { time } = req.body;

  // const userId = req.session.userId;

  const userId = req.session.userId;
  console.log(userId);
  User.findOne({ _id: userId }, function (err, foundUser) {
    console.log(foundUser.time);
    if (foundUser.time === time) {
      console.log("hello");
      return;
    } else {
      foundUser.time = time;
      foundUser.save();
      User.find({})
        .limit(20)
        .exec(function (err, foundUsers) {
          console.log(foundUsers);
          if (err) {
            console.log(err);
          } else {
            res.send(foundUsers);
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
