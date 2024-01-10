<div class="send-message">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Leave a Comment</h2>
                </div>
            </div>
            <div class="col-md-8">
                <div class="contact-form">
                    <form id="contact"  method="post" action="{{ route('comments.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <fieldset>
                                <input type="hidden" name="user_id" value="{{ auth()->user()->user_id }}">
                                <input type="hidden" name="post_id" value="{{ $post->post_id }}">
                                    <textarea name="content" rows="6" class="form-control" id="message"
                                              placeholder="Write your comment..." required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="filled-button">Comment</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                    <h2>Comments</h2>
                    @forelse ($post->comments as $comment)
                        <div>
                            <p>{{ $comment->content }}</p>
                            <p>Posted by: {{ $comment->user->name }}</p>
                            <p>Commented on: {{ $comment->comment_date }}</p>
                        </div>
                    @empty
                        <p>No comments yet.</p>
                    @endforelse
                </div>
            </div>

            <div class="col-md-4">
                <div class="left-content">

                    <p>{{ $commentSection ?? 'Lorem ipsum dolor sit amet, consectetur adipisic elit. Sed voluptate nihil eumester consectetur similiqu consectetur. Lorem ipsum dolor sit amet, consectetur adipisic elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti.' }}
                        <br>

                        <br>

                        {{ $contactSocial ?? 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, minus?' }}</p>

                    <br>

                    <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>