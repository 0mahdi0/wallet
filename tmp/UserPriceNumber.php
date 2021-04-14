<?php
    wp_enqueue_script('wp_apis_scripts_users_price');
    if(isset($_POST['Savedata']) && isset($_POST['number'])  && $action == 'edit') {  
        ?>
            <div class="notice notice-success is-dismissible"> 
            <p><strong>ذخیره شد</strong></p>
            </div>
        <?php 
            }
            if(!isset($_POST['Savedata'])  && $action == 'edit'){
        ?>
            <div class="error"> 
            <p><strong>ذخیره نشد دوباره تلاش کنید</strong></p>
            </div>
        
        <?php 
            }
        ?>
<h1 class="wp-heading-inline" >آخرین شماره پرداخت ها</h1>
<a class="button" href="<?php echo add_query_arg(['action' => 'add_new']); ?>">افزودن شناسه جدید</a>
<table class="widefat fixed alternates" cellspacing="0">
    <thead>
    <tr>

            <th  class="manage-column column-cb " scope="col">شناسه</th>
            <th  class="manage-column column-columnname " scope="col">نام کاربر</th>
            <th  class="manage-column column-columnname" scope="col">تاریخ</th>
            <th  class="manage-column column-columnname" scope="col">شماره پرداخت</th>
            <th  class="manage-column column-columnname" scope="col">تصاویر</th>
            <th  class="manage-column column-columnname num" scope="col">عملیات</th>

    </tr>
    </thead>
    <tbody>
    <?php foreach($users as $user){ ?>
        <?php foreach($users_price as $user_P){ ?>
            <?php if($user_P->user_id == $user->id){?>
        <div>
            <tr class="alternate" valign="top">
                <td class="column-columnname" scope="row"><?php echo $user_P->id; ?></td>
                <td class="column-columnname"><?php echo $user->user_login; ?></td>
                <td class="column-columnname"><?php echo $user_P->date; ?></td>
                <td class="column-columnname"><?php echo $user_P->price_number; ?></td>
                <td class="column-columnname"><img src="<?php echo $user_P->image_url; ?>" width="150" height="150"></td>
                <td class="column-columnname num">
                    <div class="row-actions">
                    <span class="trash"><a href="<?php echo add_query_arg(['action' => 'trash' , 'item' => $user_P->id ]); ?>">Delete</a> |</span>
                    <span class="Edit"><a href="#">Edit</a></span>
                    <div class="panel" style="margin: 150px -920px 0 0; width: 1000px;">
                    <form class="form_edit_U_P" action="<?php echo add_query_arg(['action' => 'edit' , 'item' => $user_P->id ]); ?>" method="post">
                        <label class="form_edit select_user" for="select-user">نام کاربر :</label>
                        <select class="option_users_login" name="user_login" placeholder="<?php echo $user->user_login; ?>">
                        <?php foreach($users as $display_user){ ?>
                            <option name="select-user"><?php echo $display_user->user_login; ?></option>
                        <?php } ?>
                        </select>                        
                        <label class="date_U_P_L form_edit" for="date_U_P">تاریخ :</label>
                        <input type="date" class="date_U_P_I" name="date_U_P">
                        <label class="form_edit number" for="number">شماره پرداخت جدید :</label>
                        <input type="text" class="price_number" name="number" placeholder="<?php echo $user_P->price_number; ?>">
                        <input type="submit" class="button" name="Savedata" value="ثبت کن">
                    </form>
                    </div>
                    </div>
                </td>
            </tr>
        </div>
        <?php }}}?>
    </tbody>
    <tfoot>
    <tr>
            <th class="manage-column column-cb" scope="col"></th>
            <th class="manage-column column-columnname" scope="col"></th>
            <th class="manage-column column-columnname" scope="col"></th>
            <th class="manage-column column-columnname" scope="col"></th>
            <th class="manage-column column-columnname" scope="col"></th>
            <th class="manage-column column-columnname" scope="col"></th>
    </tr>
    </tfoot>
</table>