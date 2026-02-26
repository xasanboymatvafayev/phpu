<?php
ob_start();
error_reporting(0);
date_default_timezone_set("Asia/Tashkent");
define('API_KEY','8788248873:AAECFEiiaZnXMnVtGBjCPA_T8U6L_wAd9PU'); // Bot Token
$time = date('H:i');
$sana = date('d.m.Y');

/*
Manba @UzCoderTeam & @PHPfunctiones
*/

function bot($method,$steps=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$steps);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}


$silka = " hozirda silka mavjud emas agar sizda silka bolsa bizga murojaat qiling @UzProDev";
$minimal = "6000";
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$text = $message->text;
$cid = $update->message->chat->id;
$uid = $message->from->id;
$mid = $message->message_id;
$chat_id = $message->chat->id;
$name = $message->chat->first_name;
$bot = bot('getme',['bot'])->result->username;
$back = "◀️ Ortga";
$step = file_get_contents("step/$cid/$cid.txt");
$num = file_get_contents("step/$cid/1.txt");
$money = file_get_contents("step/$cid/money.txt");
$blocks = file_get_contents("data/blocks.txt");
$holat = file_get_contents("data/bot.txt");
$kanal = file_get_contents("data/kanal.txt");
$channel = file_get_contents("data/channel.txt");
$paynet = file_get_contents("data/paynet.txt");
$statistika = file_get_contents("data/statistika.txt");
$admins = file_get_contents("data/admins.txt");
$administrator = "6365371142"; // Admin ID raqami   
$admin = array($administrator,$admins);

mkdir("data");
mkdir("step");
mkdir("step/$cid");

if(!file_exists("step/$cid/money.txt")){
file_put_contents("step/$cid/money.txt","0");
}

if(!file_exists("data/paynet.txt")){
file_put_contents("data/paynet.txt","2000");
}

if(in_array($cid,$admin)){
$home = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🛅 Ovoz berish"],['text'=>"🛡️Telegram bot orqali ovoz berish"],],
[['text'=>"💳 Hisobim"],['text'=>"🔄 Pul yechib olish"],],
[['text'=>"👨🏻‍💻 Boshqaruv paneli"],['text'=>"📊 Statistika"],],
]
]);
}else{
$home = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🛅 Ovoz berish"],],
[['text'=>"💳 Hisobim"],['text'=>"🔄 Pul yechib olish"],],
]
]);
}

$ovoz_yes = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🙋‍♂️ Ovoz berdim"],],
[['text'=>"$back"],],
]
]);


$panel = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"📝 Pochta tizimi"],['text'=>"📢 Kanallar boshqaruvi"],],
[['text'=>"🔐 Blok tizimi"],['text'=>"⚙ Bot sozlamalari"],],
[['text'=>"📋 Adminlar boshqaruvi"],['text'=>"🙋‍♂️ Ovoz berish narxini uzgartirish"],],
[['text'=>"$back"],],
]
]);

$message_manager = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"💬 Forward xabar yuborish"],],
[['text'=>"👨🏻‍💻 Boshqaruv paneli"],],
]
]);

$channel_manager = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"📢 Kanal qoʻshish"],['text'=>"📢 Kanalni oʻchirish"],],
[['text'=>"📋 Kanallar roʻyxati"],['text'=>"📋 Kanallar roʻyxatini oʻchirish"],],
[['text'=>"👨🏻‍💻 Boshqaruv paneli"],],
]
]);

$blok_manager = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"✅ Blokdan olish"],['text'=>"❌ Bloklash"],],
[['text'=>"📋 Bloklanganlar roʻyxati"],['text'=>"📋 Bloklanganlar roʻyxatini oʻchirish"],],
[['text'=>"👨🏻‍💻 Boshqaruv paneli"],],
]
]);

$bot_manager = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"✅ Botni yoqish"],['text'=>"❌ Botni o‘chirish"],],
[['text'=>"👨🏻‍💻 Boshqaruv paneli"],],
]
]);

$admins_manager = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"➕ Admin qoʻshish"],['text'=>"🛑 Adminlikdan olish"],],
[['text'=>"📋 Adminlar roʻyxati"],['text'=>"📋 Adminlar roʻyxatini oʻchirish"],],
[['text'=>"👨🏻‍💻 Boshqaruv paneli"],],
]
]);

$ortga = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"$back"],],
]
]);

if(isset($message)){
$get = file_get_contents("data/statistika.txt");
if(mb_stripos($get,$uid)==false){
file_put_contents("data/statistika.txt", "$getn$uid");
}
}

if(in_array($cid,$admin)){}
elseif(mb_stripos($blocks, $uid)!==false){
bot('sendMessage',[
'chat_id' =>$cid,
'text'=>"<b>⚠️ Kechirasiz <a href = 'tg://user?id=$cid'>$name</a>

📛 Siz botdan bloklangansiz!

👨🏻‍💻 Blokdan chiqish uchun bot administratoriga murojaat qiling!</b>",
'parse_mode' =>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"👨‍💻 Administrator",'url'=>"tg://user?id=$administrator"],],
]
])
]);
return false;
}

if(in_array($cid,$admin)){}
elseif($holat == "off"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"<b>🛠 Texnik xizmat davom etmoqda!

▪ Bot maʼmuriyati ushbu bot ichida baʼzi texnik ishlarni olib bormoqda.
▪ Shu sababdan menyu adminlar tomonidan oʻchirilgan va hozirda foydalanuvchilar uchun mavjud emas.
▪ Barcha funksiyalar tugallangandan keyin tiklanadi.

🔰 Agar siz ushbu botning administratori boʻlsangiz, ushbu rejimni oʻchirib qoʻyishingiz mumkin!
👉👨🏻‍💻 Boshqaruv paneli | ⚙ Bot sozlamalari.

📝 Boshqalar uchun:
ℹ️ Keyinroq qaytib keling va bot holatini tekshirish uchun /start tugmasini bosing!</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'remove_keyboard'=>true,
])
]);
return false;
}

if(isset($message) and ($channel == "true")){
$ids = explode("n",$kanal);
$soni = substr_count($kanal,"@");

foreach($ids as $id){
$keyboards = [];
$k=[];
for ($for = 1; $for <= $soni; $for++) {
$kanall=str_replace("@","",$ids[$for]);

$keyboards[]=["text"=>"$for- kanal","url"=>"https://t.me/$kanall"];
}

$keyboard2=array_chunk($keyboards, 1);
$keyboard=json_encode([
'inline_keyboard'=>$keyboard2,
]);
}

$get = bot('getChatMember',[
'chat_id'=>$id,
'user_id'=>$uid,
])->result->status;

if(in_array($cid,$admin)){}
elseif($get == "member" or $get == "administrator" or $get == "creator"){
}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>❌ Kechirasiz <a href = 'tg://user?id=$cid'>$name</a> siz bizning kanallarimizga obuna boʻlmasangiz botdan foydalana olmaysiz!
🔰 Obuna boʻlib botga qayta /start bosing!</b>",
'parse_mode'=>'html',
'reply_markup'=>$keyboard,
]); 
return false;
}
}

if($text == "/start" or $text == $back){
unlink("step/$cid/$cid.txt");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>👋 Salom <a href = 'tg://user?id=$cid'>$name</a> botimizga xush kelibsiz!
🔰 Quyidagi menyular orqali botdan foydalaning 👇</b>",
'parse_mode'=>'html',
'reply_markup'=>$home,
]);
}

if($text == "🛅 Ovoz berish"){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>

🙋‍♂️ Ovoz belish uchun silka: https://openbudget.uz/boards/initiatives/initiative/31/4b26b621-4599-4f50-9fcb-c0ffd66a3010</b>",
'parse_mode'=>'html',
'reply_markup'=>$home
]);
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Aziz foydalanuvchi siz oʻz ovozingizni berish orqali botdan $paynet so'm paynet sohibi boʼlishiz mumkin.
Unutmang sizning ovozingiz bizning 72-maktabimiz obodonlashtirish uchun juda muhim.</b>",
'parse_mode'=>'html',
'reply_markup'=>$home
]);
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>⚠️ eslatma ovoz beriyotganda sekrenshot qiling! keyin esa '🙋‍♂️ Ovoz berdim' tugmasini bosib sekrenshot qilgan rasmingizni yuboring admin rasmni ko'rib tasdiqlasa hisobingizga $paynet so'm pul qo'shiladi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$ovoz_yes
]);
}

if($text == "🙋‍♂️ Ovoz berdim"){
	bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>✅️ Yaxshi endi ovoz berganligingizni tashdiqlash uchun sekrenshotga olgan rasmingizni tashlang!

Admin tasdiqlasa hisobingizga $paynet so'm pul tushuriladi va siz telefon raqamingizga paynet qilib olishingiz mumkin.</b>",
'parse_mode'=>'html',
'reply_markup'=>$ortga
]);
file_put_contents("step/$cid/$cid.txt","ovoz_yes");
}


if($message->photo and $step == "ovoz_yes") {
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Rasm adminga yuborildi admin tasdiqlasa hisobingizga $paynet so'm tashlanadi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$home,
]);
unlink("step/$cid/$cid.txt");
bot('forwardMessage',[
'chat_id' =>$administrator, 
'from_chat_id' =>$cid, 
'message_id' =>$mid, 
]);
$get = file_get_contents("data/yes.txt");
if(mb_stripos($get,$uid)==false){
$oo = "ushbu foydalanuvchi ovoz bermagan";
}else{
	$oo = "ushbu foydalanuvchi aval ovoz bergan";
	}
bot('sendMessage',[
'chat_id'=>$administrator,
'text'=>"<b>👥 <a href = 'tg://user?id=$cid'>$name</a> oydalanovchi ovoz berganlihi haqida ariza berdi!

Ovoz bergan bulsa <code>/berdi1 $cid</code> buyrug'ini botga yuboring va uni hisobiga $paynet so'm o'tkaziladi.

♨️ $oo
⏰ Soat: $time | 📆 Sana: $sana</b>",
'parse_mode'=>'html',
'reply_markup'=>$home,
]);
}

if(mb_stripos($text,"/berdi1 ")!==false){
$id = explode(" ",$text)[1];
$get = file_get_contents("data/yes.txt");
file_put_contents("data/yes.txt", "$getn$id");
$money = file_get_contents("step/$id/money.txt");
$pp = $money + $paynet;
file_put_contents("step/$id/money.txt", "$pp");
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"<b>✅️ Hurmatli foydalanuvchi adminga yuborgan arizangiz tasdiqlandi va sizning hisobingizga $paynet so'm tushurildi!

⏰ Soat: $time | 📆 Sana: $sana</b>",
'parse_mode'=>'html',
'reply_markup'=>$home,
]);
bot('sendMessage',[
'chat_id'=>$administrator,
'text'=>"<b>👥 Foydalanuvchi hisobiga $paynet so'm qo'shildi!
⏰ Soat: $time | 📆 Sana: $sana</b>",
'parse_mode'=>'html',
'reply_markup'=>$home,
]);
}
if($text == "🛡️Tg bot orqali ovoz berish"){bot('sendMessage',['chat_id'=>$cid,
'text'=>"<b>Telegram bit orqali ovoz bersa ham bo'ladi marhamat pastdagi silka orqali botga kirib start bosasiz va ro'yhatdan utgach ovoz berasiz...
https://t.me/UzProDev</b>",
'parse_mode'=>'html',
'reply_markup'=>$home,
]);
}

if($text == "💳 Hisobim"){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>💰 Hisobda $money so'm mavjud</b>",
'parse_mode'=>'html',
'reply_markup'=>$home,
]);
}

if($text == "🔄 Pul yechib olish"){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>👉 Pul yechib olish uchun iltimos Telefon raqamni kiriting.

Tel raqam uchun namuna: +998931234567
Karta uchun namuna: 1101 1223 3445 8566
</b>

ℹ️ <i>Minimal pul yechish miqdori: $minimal so'm</i>",
'parse_mode'=>'html',
'reply_markup'=>$ortga,
]);
file_put_contents("step/$cid/$cid.txt","money_yech");
}

if($step == "money_yech") {
if(mb_stripos($text,"+998")!==false){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>👉 Pul yechib olish uchun pul miqdorini kiriting.</b>

ℹ️ <i>Minimal pul yechish miqdori: $minimal so'm</i>",
'parse_mode'=>'html',
'reply_markup'=>$ortga,
]);
file_put_contents("step/$cid/$cid.txt","money_yech11");
file_put_contents("step/$cid/1.txt","$text");
}else{
	bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>❌️ Nomer xato kiritildi! Boshqatdan kiriting! agarda botdagi hatollikni kurgan bolsangiz yoki kamchliklarni kurgan bolsangiz adminga murojaatn qilishingizni iltimos qilib qolamiz @UzProDev</b>

ℹ️ <i>Minimal pul yechish miqdori: $minimal so'm</i>",
'parse_mode'=>'html',
'reply_markup'=>$ortga,
]);
}
}

if($step == "money_yech11") {
if($text >= "$minimal" and $money >= $text){
$pp = $money - $text;
file_put_contents("step/$cid/money.txt", "$pp");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Adminga pul yechib olish uchun arizangiz yuborildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$home,
]);
bot('sendMessage',[
'chat_id'=>$administrator,
'text'=>"<b>👥 <a href = 'tg://user?id=$cid'>$name</a> obunachi pul yechib olish haqida ariza berdi!

🔔 Pul miqdori: $text

⏳️ Telefon raqami: $num

✅️ Pul tashlab bergan bo'lsangiz <code>/pulyes $cid</code> buyrug'ini botga yuboring va unga habar beriladi.

⏰ Soat: $time | 📆 Sana: $sana</b>",
'parse_mode'=>'html',
'reply_markup'=>$home,
]);
unlink("step/$cid/$cid.txt");
}else{
	bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>⚠️ Kechirasiz, ayriboshlash uchun hisob yetarli emas.</b>

ℹ️ <i>Minimal pul yechish miqdori: $minimal so'm</i>",
'parse_mode'=>'html',
'reply_markup'=>$ortga,
]);
}
}

if(mb_stripos($text,"/pulyes ")!==false){
$id = explode(" ",$text)[1];
$get = file_get_contents("data/yes.txt");
file_put_contents("data/yes.txt", "$getn$id");
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"<b>✅️ Hurmatli foydalanuvchi adminga yuborgan arizangiz tasdiqlandi sizning raqamingizga pul tashlandi.

⏰ Soat: $time | 📆 Sana: $sana</b>",
'parse_mode'=>'html',
'reply_markup'=>$home,
]);
bot('sendMessage',[
'chat_id'=>$administrator,
'text'=>"<b>👥 Foydalanuvchiga pul tashlaganingiz haqida xabar berildi
⏰ Soat: $time | 📆 Sana: $sana</b>",
'parse_mode'=>'html',
'reply_markup'=>$home,
]);
}

/*
Manba @UzCoderTeam & @PHPfunctiones
*/

if($text == "📊 Statistika"){
$get = substr_count($statistika,"n");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>👥 Bot foydalanuvchilari: $get nafar
⏰ Soat: $time | 📆 Sana: $sana</b>",
'parse_mode'=>'html',
'reply_markup'=>$ortga,
]);
}

if($text == "👨🏻‍💻 Boshqaruv paneli"){
if(in_array($cid,$admin)){
unlink("step/$cid/$cid.txt");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>👨🏻‍💻 Boshqaruv paneliga xush kelibsiz!
📋 Quyidagi boʻlimlardan birini tanlang!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>👨‍💻 Bu bo‘limni faqat bot administratori ishlata oladi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$home,
]);
}
}

if(in_array($cid,$admin)){
if($text == "📝 Pochta tizimi"){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📝 Pochta tizimi boʻlimidasiz!
📋 Quyidagi boʻlimlardan birini tanlang!</b>",
'parse_mode'=>'html',
'reply_markup'=>$message_manager,
]);
}
}

if($text == "💬 Forward xabar yuborish"){
file_put_contents("step/$cid/$cid.txt","forward");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>👥 Foydalanuvchilarga yuboriladigan xabarni forward qiling!</b>",
'parse_mode'=>'html',
'reply_markup'=>$ortga,
'disable_web_page_preview'=>true,
]);
}

if($step == "forward" and $text!= "/start" and $text!= $back and $text!= "👨🏻‍💻 Boshqaruv paneli"){
unlink("step/$cid/$cid.txt");
$explode = explode("n",$statistika);
foreach($explode as $id){
$forward = bot('forwardMessage',[
'chat_id' =>$id, 
'from_chat_id' =>$cid, 
'message_id' =>$mid, 
]);
}
}

if($forward){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>👥 Forward xabaringiz barcha bot foydalanuvchilariga yuborildi!✅</b>",
'parse_mode'=>'html',
'reply_markup'=>$message_manager,
]);
}

if(in_array($cid,$admin)){
if($text == "📢 Kanallar boshqaruvi"){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📢 Kanallar boshqaruvi boʻlimidasiz!
📋 Quyidagi boʻlimlardan birini tanlang!</b>",
'parse_mode'=>'html',
'reply_markup'=>$channel_manager,
]);
}
}

if(in_array($cid,$admin)){
if($text == "📢 Kanal qoʻshish"){
file_put_contents("step/$cid/$cid.txt","kanal");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📡 Kanal qo‘shish uchun kanal havolasini yuboring!
🔰 Masalan: @UzCoderTeam</b>",
'parse_mode'=>'html',
'reply_markup'=>$ortga,
]);
}
}

if($step == "kanal" and $text!= "/start" and $text!= $back and $text!= "👨🏻‍💻 Boshqaruv paneli"){
if(mb_stripos($kanal,"$text")!==false){
}else{
file_put_contents("data/kanal.txt","$kanaln$text");
file_put_contents("data/channel.txt","true");
unlink("step/$cid/$cid.txt");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📡 Kanalingiz botga muvaffaqiyatli qo‘shildi!
🤖 Endi botni kanalingizga admin qiling!</b>",
'parse_mode'=>'html',
'reply_markup'=>$channel_manager,
]);
}
}

if(in_array($cid,$admin)){
if($text == "📢 Kanalni oʻchirish"){
file_put_contents("step/$cid/$cid.txt","delete");
$ids = explode("n",$kanal);
$soni = substr_count($kanal,"@");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📡 Kanalni oʻchirish uchun kanal havolasini yuboring!

🔰 Masalan: @UzCoderTeam

👇 Botga ulangan kanallar:
$kanal

📝 Jami kanallar soni: $soni ta
</b>",
'parse_mode'=>'html',
'reply_markup'=>$ortga,
]);
}
}

/*
Manba @UzCoderTeam & @PHPfunctiones
*/

if($step == "delete" and $text!= "/start" and $text!= $back and $text!= "👨🏻‍💻 Boshqaruv paneli"){
if(mb_stripos($kanal,"$text")!==false){
$k = str_replace("n".$text."","",$kanal);
file_put_contents("data/kanal.txt",$k);
unlink("step/$cid/$cid.txt");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>🔰 $text muvaffaqiyatli oʻchirildi! ✅</b>",
'parse_mode'=>'html',
'reply_markup'=>$channel_manager,
]);
}
}

if(in_array($cid,$admin)){
if($text == "📋 Kanallar roʻyxati"){
if($kanal == null){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📋 Botga ulangan kanallar mavjud emas!</b>",
'parse_mode'=>'html',
'reply_markup'=>$channel_manager,
]);
}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📋 Kanallar roʻyxati:
$kanal</b>",
'parse_mode'=>'html',
'reply_markup'=>$channel_manager,
]);
}
}
}

if(in_array($cid,$admin)){
if($text == "?? Kanallar roʻyxatini oʻchirish"){
if($kanal == null){
unlink("data/kanal.txt");
unlink("data/channel.txt");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📋 Botga ulangan kanallar mavjud emas!</b>",
'parse_mode'=>'html',
'reply_markup'=>$channel_manager,
]);
}else{
unlink("data/kanal.txt");
unlink("data/channel.txt");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📋 Kanallar roʻyxati muvaffaqiyatli oʻchirildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$channel_manager,
]);
}
}
}

if(in_array($cid,$admin)){
if($text == "🔐 Blok tizimi"){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>🔐 Blok tizimi boʻlimidasiz!
📋 Quyidagi boʻlimlardan birini tanlang!</b>",
'parse_mode'=>'html',
'reply_markup'=>$blok_manager,
]);
}
}

if(in_array($cid,$admin)){
if($text == "✅ Blokdan olish"){
file_put_contents("step/$cid/$cid.txt","unblock");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>🚫 Blokdan olinadigan foydalanuvchini ID raqamini kiriting!</b>",
'parse_mode'=>'html',
'reply_markup'=>$ortga,
]);
}
}

if(in_array($cid,$admin)){
if($step == "unblock" and $text!= "/start" and $text!= $back and $text!= "👨🏻‍💻 Boshqaruv paneli"){
unlink("step/$cid/$cid.txt");
if(mb_stripos($blocks, $text)==false){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>👨🏻‍💻 Ushbu foydalanuvchi botdan bloklanmagan!</b>",
'parse_mode'=>'html',
'reply_markup'=>$blok_manager,
]);
}else{
$bl = str_replace("$text", " ", $blocks);
file_put_contents("data/blocks.txt", "$bl");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>🔰 Foydalanuvchi blokdan olindi! ✅</b>",
'parse_mode'=>'html',
'reply_markup'=>$blok_manager,
]);
bot('sendMessage',[
'chat_id'=>$text,
'text'=>"<b>🎉 Siz blokdan muvaffaqiyatli olindingiz!

🔄 Yana botni ishlatishingiz mumkin!

🤖 Botga qayta /start bosing ✅</b>",
'parse_mode'=>'html',
'reply_markup'=>$home,
]);
}
}
}

if(in_array($cid,$admin)){
if($text == "❌ Bloklash"){
file_put_contents("step/$cid/$cid.txt","block");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>🚫 Bloklanadigan foydalanuvchini ID raqamini kiriting!</b>",
'parse_mode'=>'html',
'reply_markup'=>$ortga,
]);
}
}

if(in_array($cid,$admin)){
if($step == "block" and $text!= "/start" and $text!= $back and $text!= "👨🏻‍💻 Boshqaruv paneli"){
if(mb_stripos($blocks, $text)==false){
file_put_contents("data/blocks.txt", "$blocksn$text");
unlink("step/$cid/$cid.txt");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>🔰 Foydalanuvchi bloklandi! ✅</b>",
'parse_mode'=>'html',
'reply_markup'=>$blok_manager,
]);
bot('sendMessage',[
'chat_id'=>$text,
'text'=>"<b>🚫 Siz bizning botimizdan bloklandingiz!

🔄 Endi botdan foydalana olmaysiz!

👨‍💻 Blokdan chiqish uchun bot administratoriga murojaat qiling!</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'remove_keyboard'=>true,
])
]);
}else{
unlink("step/$cid/$cid.txt");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>👨🏻‍💻 Ushbu foydalanuvchi botdan allaqachon bloklangan!</b>",
'parse_mode'=>'html',
'reply_markup'=>$blok_manager,
]);
}
}
}

if(in_array($cid,$admin)){
if($text == "📋 Bloklanganlar roʻyxati"){
if($blocks == null){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📋 Botdan bloklanganlar mavjud emas!</b>",
'parse_mode'=>'html',
'reply_markup'=>$blok_manager,
]);
}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📋 Botdan bloklanganlar roʻyxati:
$blocks</b>",
'parse_mode'=>'html',
'reply_markup'=>$blok_manager,
]);
}
}
}

if(in_array($cid,$admin)){
if($text == "📋 Bloklanganlar roʻyxatini oʻchirish"){
if($blocks == null){
unlink("data/blocks.txt");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📋 Botdan bloklanganlar mavjud emas!</b>",
'parse_mode'=>'html',
'reply_markup'=>$blok_manager,
]);
}else{
unlink("data/blocks.txt");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📋 Bloklanganlar roʻyxati muvaffaqiyatli oʻchirildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$blok_manager,
]);
}
}
}

if(in_array($cid,$admin)){
if($text == "⚙ Bot sozlamalari"){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>⚙ Bot sozlamalari boʻlimidasiz!
📋 Quyidagi boʻlimlardan birini tanlang!</b>",
'parse_mode'=>'html',
'reply_markup'=>$bot_manager,
]);
}
}

if(in_array($cid,$admin)){
if($text == "✅ Botni yoqish"){
unlink("data/bot.txt");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>⚠️ Bot muvaffaqiyatli yoqildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$bot_manager,
]);
}
}

if(in_array($cid,$admin)){
if($text == "❌ Botni o‘chirish"){
file_put_contents("data/bot.txt","off");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>⚠️ Bot muvaffaqiyatli oʻchirildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$bot_manager,
]);
}
}
/*
Manba @UzCoderTeam & @PHPfunctiones
*/

if(in_array($cid,$admin)){
if($text == "📋 Adminlar boshqaruvi"){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📋 Adminlar boshqaruvi boʻlimidasiz!
📋 Quyidagi boʻlimlardan birini tanlang!</b>",
'parse_mode'=>'html',
'reply_markup'=>$admins_manager,
]);
}
}

if(in_array($cid,$admin)){
if($text == "➕ Admin qoʻshish"){
file_put_contents("step/$cid/$cid.txt","setadmins");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>👨‍💻 Administrator qoʻshish uchun foydalanuvchi ID raqamini kiriting</b>",
'parse_mode'=>'html',
'reply_markup'=>$ortga,
]);
}
}

if($step == "setadmins" and $text!= "/start" and $text!= $back and $text!= "👨🏻‍💻 Boshqaruv paneli"){
if(is_numeric($text)){
if(mb_stripos($statistika,$text)!==false){
file_put_contents("data/admins.txt","$adminsn$text");
unlink("step/$cid/$cid.txt");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📝 <a href = 'tg://user?id=$text'>$text</a> ID raqamli foydalanuvchi botga administrator qilib tayinlandi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$admins_manager,
]);
bot('sendMessage',[
'chat_id'=>$text,
'text'=>"<b>👨‍💻 Siz botga administrator qilib tayinlandingiz!</b>",
'parse_mode'=>'html',
'reply_markup'=>$home,
]);
}else{
unlink("step/$cid/$cid.txt");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>👨‍💻 Ushbu foydalanuvchi bazada mavjud emas!</b>",
'parse_mode'=>'html',
'reply_markup'=>$admins_manager,
]);
}
}else{
unlink("step/$cid/$cid.txt");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📋 ID raqam kiritayotganda faqat raqamlardan foydalaning!</b>",
'parse_mode'=>'html',
'reply_markup'=>$admins_manager,
]);
}
}

if(in_array($cid,$admin)){
if($text == "🛑 Adminlikdan olish"){
if($admins == null){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📋 Botda administratorlar mavjud emas!</b>",
'parse_mode'=>'html',
'reply_markup'=>$admins_manager,
]);
}else{
file_put_contents("step/$cid/$cid.txt","deladmins");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>👨‍💻 Administratorni olib tashlash uchun foydalanuvchi ID raqamini kiriting</b>",
'parse_mode'=>'html',
'reply_markup'=>$ortga,
]);
}
}
}

if($step == "deladmins" and $text!= "/start" and $text!= $back and $text!= "👨🏻‍💻 Boshqaruv paneli"){
if(is_numeric($text)){
if(mb_stripos($admins,$text)!==false){
unlink("step/$cid/$cid.txt");
$ad = str_replace("n".$text."","",$admins);
file_put_contents("data/admins.txt",$ad);
unlink("step/$cid/$cid.txt");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📋 <a href = 'tg://user?id=$text'>$text</a> ID raqamli foydalanuvchi bot administratorligidan olib tashlandi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$admins_manager,
]);
bot('sendMessage',[
'chat_id'=>$text,
'text'=>"<b>👨‍💻 Siz bot administratorligidan olib tashlandingiz!</b>",
'parse_mode'=>'html',
'reply_markup'=>$home,
]);
}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📋 <a href = 'tg://user?id=$text'>$text</a> ID raqamli foydalanuvchi botda administrator emas!</b>",
'parse_mode'=>'html',
'reply_markup'=>$admins_manager,
]);
}
}else{
unlink("step/$cid/$cid.txt");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📋 ID raqam kiritayotganda faqat raqamlardan foydalaning!</b>",
'parse_mode'=>'html',
'reply_markup'=>$admins_manager,
]);
}
}

if(in_array($cid,$admin)){
if($text == "📋 Adminlar roʻyxati"){
if($admins == null){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📋 Botda administratorlar mavjud emas!</b>",
'parse_mode'=>'html',
'reply_markup'=>$admins_manager,
]);
}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📋 Administratorlar roʻyxati:
$admins</b>",
'parse_mode'=>'html',
'reply_markup'=>$admins_manager,
]);
}
}
}

if(in_array($cid,$admin)){
if($text == "📋 Adminlar roʻyxatini oʻchirish"){
if($admins == null){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📋 Botda administratorlar mavjud emas!</b>",
'parse_mode'=>'html',
'reply_markup'=>$admins_manager,
]);
}else{
unlink("data/admins.txt");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📋 Administratorlar roʻyxati muvaffaqiyatli oʻchirildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$admins_manager,
]);
}
}
}

if(in_array($cid,$admin)){
if($text == "🙋‍♂️ Ovoz berish narxini uzgartirish"){
file_put_contents("step/$cid/$cid.txt","setpey");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>🙋‍♂️ Ovoz berish narxini kiriting</b>",
'parse_mode'=>'html',
'reply_markup'=>$ortga,
]);
}
}

if($step == "setpey" and $text!= "/start" and $text!= $back and $text!= "👨🏻‍💻 Boshqaruv paneli"){
if(is_numeric($text)){
unlink("step/$cid/$cid.txt");
file_put_contents("data/paynet.txt","$text");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📝 🙋‍♂️ Ovoz berish narxini uzgartirildi</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
}else{
unlink("step/$cid/$cid.txt");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📋 Narx kiritayotganda faqat raqamlardan foydalaning!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]); 
}
}

/*
Manba @UzCoderTeam & @PHPfunctiones
*/

?>
