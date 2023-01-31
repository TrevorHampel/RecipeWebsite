<?php
class T_Hash
{
    /**
     * hashPass hashes the password for a user
     *
     * @param string $uIn username
     * @param string $pIn password as plain text input
     * @return string
     */
    function hashPass($pIn)
    {
        $salt1 = 'n239v[d98q3hqv';
        $salt2 = '349uvnd;f]wefv';

        $saltedU = $salt1 . $salt2;
        $saltedU2 = $salt2 . $salt1 . $salt1;

        $salt3 = hash('sha512', $saltedU);
        $salt4 = hash('sha512', $saltedU2);

        $saltedP = $salt3 . $pIn . $salt4;
        $saltedP = hash('sha512', $saltedP);

        echo $saltedP;
    }
}
