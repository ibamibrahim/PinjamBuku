<?php

$isLoggedIn = $this->session->has_userdata('username');
if($isLoggedIn){
if($quantity > 0){
$isSudahDipinjam = false;
foreach($loaned_book as $book){
if($book_id == $book->book_id) {
//buku udah dipinjem
echo '<form action="books/kembalikan" method="post">
    <input type="hidden" name="loan_id" value="' .$book->loan_id .'">
    <input type="hidden" name="book_id_kembalikan" value="'.$book_id.'">
    <button type="submit" class="btn btn-danger btn-sm" value="Kembalikan">Kembalikan</button>
</form>';
$isSudahDipinjam = true;
break;
}
}
if(!$isSudahDipinjam){
echo '<form action="books/pinjam" method="post">
    <input type="hidden" name="book_id_pinjam" value="'.$book_id.'">
    <button type="submit" class="btn btn-primary btn-sm" value="Pinjam">Pinjam</button>
</form>';
}
} else {
echo '<form action="books/pinjam" method="post">
    <input type="hidden" name="book_id_pinjam" value="'.$book_id.'">
    <input type="submit" class="btn btn-primary btn-sm" value="Stock habis" disabled>
</form>';
}
} else {
echo '<form action="login" method="post"><button type="submit" class="btn btn-primary btn-sm" value="Pinjam">Login untuk meminjam</button></form>';
}

?>