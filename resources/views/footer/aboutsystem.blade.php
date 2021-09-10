@extends('layouts.master')
@section('content')

    <div class="p-5 card mx-auto" style="margin-top: 58px; width: 50rem; ">
        <h3 class="card-title">System Builder</h3>
        <div class="card-body">
            <div class="p-5 card mx-auto" style="margin-top: 58px; width: 40rem; ">
                <p class="text-center">
                    The System Builder is a tool to help a user construct a list of different components that the user will order/purchase to complete their System Unit.
                    The System Builder lets you select components between the categories of Motherboard, Graphics Card, Processor, Storage, Power Supply Unit, Memory, Case, and CPU Cooler.
                    The Motherboard is responsible for holding distributing power throughout the system. The Graphics Card is the one who renders Graphics into the system.
                    The Processor is the one responsible for doing the computing in the system and carrying out various processes. The Storage is a device to store your kept data. The Power Supply Unit
                    is responsible for providing and regulating power throughout the system. The Memory is for temporary store of data within the system. The Case is the holder of every component to make sure its protected.
                    The CPU Cooler is meant for cooling for the Processor/CPU to keep it cool.</p>
            </div>
        </div>
    </div>

    <div class="p-5 card mx-auto" style="margin-top: 116px; width: 50rem; ">
        <h3 class="card-title">Content Based Recommender System</h3>
        <div class="card-body">
            <div class="p-5 card mx-auto" style="margin-top: 60px; width: 40rem; ">
                <p class="text-center">
                    A recommendation system can give Automatic and Manual recommendations to consumers. Automatic recommendations are
                    made without effort, while manual recommendations mean that the consumer will use
                    effort to seek out recommendations. A recommendation system can be integrated with
                    various techniques and algorithms, one of the simplest and natural approach is through
                    implementing Content-based Filtering. </p>
                <p class="text-center">
                    Content-based filtering in relation with Recommendation System commonly
                    known as Content-Based Recommendation Systems (CBRS) is commonly implemented
                    on web applications in which users interact with the system. Implementing it on an E-15
                    commerce website allows presentation of only the relevant items to the specific user. The
                    items presented to the user are based on the item description and the profile of a user’s
                    interest. The basic process of CBRS consists of extracting the information of the user and
                    items, learning the user profile through a model, and comparing between the attributes of
                    the user profile to the attributes of the item in order to recommend the specific item to the
                    certain user (Lops, de Gemmis, & Semeraro, 2011)
                </p>
            </div>
        </div>
    </div>
@endsection
