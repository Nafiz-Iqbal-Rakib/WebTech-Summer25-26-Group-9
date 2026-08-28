<?php

class UserController
{
    public function getUsers()
    {
        $users = [

            [
                "initial" => "A",
                "name" => "Ayaan Rahman",
                "email" => "ayaan@example.com",
                "role" => "CUSTOMER",
                "roleClass" => "badge-customer",
                "orders" => 8,
                "status" => "active"
            ],

            [
                "initial" => "N",
                "name" => "Nadia Islam",
                "email" => "nadia@example.com",
                "role" => "CUSTOMER",
                "roleClass" => "badge-customer",
                "orders" => 14,
                "status" => "active"
            ],

            [
                "initial" => "K",
                "name" => "Karim Hossain",
                "email" => "karim@arabi.com",
                "role" => "DELIVERY",
                "roleClass" => "badge-delivery",
                "orders" => "—",
                "status" => "active"
            ],

            [
                "initial" => "S",
                "name" => "Sumaiya Begum",
                "email" => "sumaiya@example.com",
                "role" => "CUSTOMER",
                "roleClass" => "badge-customer",
                "orders" => 3,
                "status" => "suspended"
            ],

            [
                "initial" => "R",
                "name" => "Rafiq Ahmed",
                "email" => "rafiq@arabi.com",
                "role" => "DELIVERY",
                "roleClass" => "badge-delivery",
                "orders" => "—",
                "status" => "active"
            ],

            [
                "initial" => "F",
                "name" => "Fatima Khanam",
                "email" => "fatima@example.com",
                "role" => "CUSTOMER",
                "roleClass" => "badge-customer",
                "orders" => 6,
                "status" => "active"
            ],

            [
                "initial" => "T",
                "name" => "Tariq Miah",
                "email" => "tariq@arabi.com",
                "role" => "DELIVERY",
                "roleClass" => "badge-delivery",
                "orders" => "—",
                "status" => "deactivated"
            ],

            [
                "initial" => "S",
                "name" => "Shirina Akter",
                "email" => "shirina@example.com",
                "role" => "CUSTOMER",
                "roleClass" => "badge-customer",
                "orders" => 1,
                "status" => "active"
            ],

            [
                "initial" => "O",
                "name" => "Omar Faruk",
                "email" => "omar@example.com",
                "role" => "CUSTOMER",
                "roleClass" => "badge-customer",
                "orders" => 9,
                "status" => "active"
            ],

            [
                "initial" => "M",
                "name" => "Mim Sultana",
                "email" => "mim@example.com",
                "role" => "CUSTOMER",
                "roleClass" => "badge-customer",
                "orders" => 2,
                "status" => "active"
            ]

        ];

        return $users;
    }
}