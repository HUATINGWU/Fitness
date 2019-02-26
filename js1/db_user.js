function getUserManager() {
    // 用户数据的基本结构
    var user = {
        account: undefined, // string key
        pwd: undefined,     // string
        name: undefined,    // string
        gender: undefined,  // string
        age: undefined,     // int
        tel: undefined,     // string
        email: undefined,   // string
        address: undefined, // string
    }

    // 
    // 结构：('user_' + 'account', 'account|pwd|name|gender|age|tel|email|address')
    var key_user_prefix = 'user_';                  // localStorage
    var key_cur_user_account = 'cur_user_account';  // sessionStorage

    // 注册用户
    function registerUser(user) {
        var result = false; // true: success; false: existed; 
        var key = key_user_prefix + user.account;
        if (localStorage.getItem(key)) {
            //   do nothing
            console.warn('user has been existed');
        } else {
            registerOrUpdateUser(user);
            result = true;
        }
        return result;
    }
    // 更新用户
    function updateUser(user) {
        var result = false; // true: success; false: existed; 
        var key = key_user_prefix + user.account;
        if (localStorage.getItem(key)) {
            registerOrUpdateUser(user);
            result = true;
        } else {
            //   do nothing
            console.warn('user has not been existed');
        }
        return result;
    }
    // 注册或更新用户
    function registerOrUpdateUser(user) {
        var key = key_user_prefix + user.account;
        var value = user.account +
            '|' + user.pwd +
            '|' + user.name +
            '|' + user.gender +
            '|' + user.age +
            '|' + user.tel +
            '|' + user.email +
            '|' + user.address;
        localStorage.setItem(key, value);
    }

    // 删除用户
    function unregisterUser(account) {
        localStorage.removeItem(key_user_prefix + account);
    }

    // 检查用户是否存在
    function checkUser(account, pwd) {
        var existed = false;
        var value = localStorage.getItem(key_user_prefix + account);
        if (value) {
            var items = value.split('|');
            var real_pwd = items[1];
            if (pwd === real_pwd) {
                existed = true;
            }
        }
        return existed;
    }

    // 根据账号获取用户信息
    function getUserByAccount(account, showPwd) {
        var user = undefined;
        var value = localStorage.getItem(key_user_prefix + account);
        if (value) {
            var items = value.split('|');
            user = {
                account: items[0],                              // string account
                pwd: (showPwd === true) ? items[1] : '******',   // string
                name: items[2],                                 // string
                gender: items[3],                               // string
                age: parseInt(items[4]),                        // int
                tel: items[5],                                  // string
                email: items[6],                                // string
                address: items[7],                              // string
            };
        }
        return user;
    }
    // 根据条件列出所有的用户信息
    function listAllUsers(showPwd, conditions) {
        var users = [];
        for (var i = 0; i < localStorage.length; i++) {
            var key = localStorage.key(i);
            if (key.startsWith(key_user_prefix)) {
                var account = key.substring(key_user_prefix.length, key.length);
                var user = getUserByAccount(account, showPwd);
                // 判断条件
                if (conditions) {
                    // TODO 这里以性别和年龄为例进行筛选，其它的筛选选项请自行定义。
                    var meet = true;
                    if (conditions.gender) {
                        meet = meet && user.gender === conditions.gender;
                    }
                    if (conditions.minAge) {
                        meet = meet && user.age >= conditions.minAge;
                    }
                    if (conditions.maxAge) {
                        meet = meet && user.age <= conditions.maxAge;
                    }
                    if (meet) {
                        users.push(user);
                    }
                } else {
                    users.push(user);
                }
            }
        }
        return users;
    }



    // 用户登录
    function login(accout, pwd) {
        var user = undefined;
        if (checkUser(accout, pwd)) {
            user = getUserByAccount(accout);
            sessionStorage.setItem(key_cur_user_account, accout);
        }
        return user;
    }
    // 用户注销
    function logout() {
        var result = false; // true：用户成功登出；false：用户未登录
        if (sessionStorage.getItem(key_cur_user_account)) {
            sessionStorage.removeItem(key_cur_user_account);
            result = true;
        } else {
            // do nothing
        }
        return result;
    }
    // 获取当前用户信息
    function getCurrentUser() {
        var user = undefined;
        var cur_user_account = sessionStorage.getItem(key_cur_user_account);
        if (cur_user_account) {
            user = getUserByAccount(cur_user_account);
        }
        return user;
    }




    // --------------------------------------------------------------------------------------
    return {
        registerUser: registerUser,
        updateUser: updateUser,
        registerOrUpdateUser: registerOrUpdateUser,
        unregisterUser: unregisterUser,
        checkUser: checkUser,
        getUserByAccount: getUserByAccount,
        listAllUsers: listAllUsers,
        login: login,
        logout: logout,
        getCurrentUser: getCurrentUser,
    };

}