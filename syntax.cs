using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Register
{
    #region Syntax
    public class Syntax
    {
        #region Member Variables
        protected int _id;
        protected string _username;
        protected string _email;
        protected string _password;
        #endregion
        #region Constructors
        public Syntax() { }
        public Syntax(string username, string email, string password)
        {
            this._username=username;
            this._email=email;
            this._password=password;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Username
        {
            get {return _username;}
            set {_username=value;}
        }
        public virtual string Email
        {
            get {return _email;}
            set {_email=value;}
        }
        public virtual string Password
        {
            get {return _password;}
            set {_password=value;}
        }
        #endregion
    }
    #endregion
}