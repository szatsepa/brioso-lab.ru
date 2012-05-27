<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="main_menu" style="position: relative;width: 1010px;height: 108px;background-image: url('http://brioso-lab.ru/images/header_bg.png');">
    <div style="position: relative;float: left;width: 160px;height: 27px;top: 1px;margin-left: 518px;font-size: 16px;">
        <p>tel. 999-55-22 <br/><small>круглосуточно</small></p>
    </div>
    <div style="position: relative;float: left;width: 120px;top: 16px;">
        <input style="font-size: 14px;color: black;" type="button" id="entry" value="Войти" name="index"/>
    </div>
    <div style="position: relative;float: left;width: 140px;height: 104px;margin-left: 174px;top: -20px;">
        <p>
            <a href="index.php?act=cart" style="font-size: 16px;color: black;">Корзина</a>
         </p>
         <p id="count">
             Товаров - 2
         </p>
         <p id="count">
             На сумму - 1254 р.
         </p>
    </div>
    
</div>
<div style="position: relative;width: 96%;height: 56px;margin: 0 auto;padding-left: 42px;padding-top: 16px;">
    <table>
        <tr>
            <td>
                <a class="subhead" href="index.php?act=main">Создай цвет</a>
            </td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>
                <a class="subhead"  href="">Как это работает</a>
            </td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>
                <a class="subhead"  href="">Видео</a>
            </td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>
                <a class="subhead"  href="">Вдохновение</a>
            </td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>
                <a class="subhead"  href="">Примерочная</a>
            </td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>
               <a class="subhead"  href="">Оплата</a> 
            </td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>
                <a class="subhead"  href="">Доставка</a>
            </td>
        </tr>
    </table>

</div>
    <div id="vrWrapper">
        <div id="wr" class="wr" style="margin: 12px auto;">
            <div id="indicator">
            </div>
            <div class='loginBlock' id="signup" style="display: none">
                <label for="email">Email:</label> <input id="email" type="text" class='textinput' />
                <label for="password">Пароль:</label> <input id="password" type="password" class='textinput' />
                <label for="passwordAgain">Пароль еще раз:</label> <input id="passwordAgain" type="password"
                    class='textinput' />
                <div id="error0" class="error displaynone">
                </div>
                <div class='buttonDiv'>
                    <input id="registerButton" type="button" value="Зарегистрироваться" onclick="SignUp()" /></div>
                    
                <div class='additional'>
                    <a name="remind">Вспомнить пароль</a> 
                    <a name="index">Войти</a>
                </div>
                
                
            </div>
            <div class='loginBlock' id="signin"  style="display: none">
                <label for="email">Email:</label> <input id="loginEmail" type="text" class='textinput' />
                <label for="password">Пароль:</label> <input id="loginPass" type="password" class='textinput' />
                <div id="error1" class="error displaynone">
                </div>
                <div class='buttonDiv'>
                    <input id="loginButton" type="button" value="Войти" onclick="SignIn()" />
                </div>
                <div class='additional'>
                    <a name="remind">Вспомнить пароль</a> 
                    <a name="signup">Зарегистрироваться</a>
                </div>
            </div>
            <div class='loginBlock' id="remindPass" style="display: none">
                <div class="description">
                    Чтобы вспомнить пароль, вспомните для начала хотя бы email.
                </div>
                <label for="email">Email:</label> <input id="remindEmail" type="text" class='textinput' />
                <div id="error2" class="error displaynone">
                </div>
                <div id="message0" class="message displaynone">
                </div>
                <div class='buttonDiv'>
                    <input id="remindButton" type="button" value="Выслать пароль" onclick="RemindPassword()" /></div>
                <div class='additional'>
                    <a name="index">Войти</a> 
                    <a name="signup">Зарегистрироваться</a></div>
            </div>
        </div>
    </div>