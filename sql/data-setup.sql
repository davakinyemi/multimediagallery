--
-- playlist
--
INSERT INTO `playlist` (`id`, `user_id`, `content_id`) VALUES (1, 1, 1);
-- INSERT INTO `playlist` (`id`, `user_id`, `content_id`) VALUES (2, 1, 2);
-- INSERT INTO `playlist` (`id`, `user_id`, `content_id`) VALUES (3, 1, 3);

--
-- content
--
INSERT into `content` (`id`, `user_id`, `channel_id`, `title`, `description`, `media_file`, `thumbnail`, `likes`, `dislikes`) VALUES (1, 1, 1, 'Countryside Landscape', 'A stock footage of the countryside landscape.', 'alexander-shatov.jpg', 'countryside-landscape.mp4', 0, 0);
-- INSERT into `content` (`id`, `user_id`, `channel_id`, `title`, `description`, `media_file`, `thumbnail`, `likes`, `dislikes`) VALUES (2, 1, 1, 'How to submit a form with NodeJS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque congue lobortis diam vitae egestas. Sed quis lacus at augue blandit ornare.', 'hello-world.png', 'song-three.mp4', 0, 0);
-- INSERT into `content` (`id`, `user_id`, `channel_id`, `title`, `description`, `media_file`, `thumbnail`, `likes`, `dislikes`) VALUES (3, 1, 1, 'Lorem ipsum Amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fringilla velit a elementum gravida.', 'banner-auth.png', 'song-three.mp4', 6, 1);
-- INSERT into `content` (`id`, `user_id`, `channel_id`, `title`, `description`, `media_file`, `thumbnail`, `likes`, `dislikes`) VALUES (4, 1, 1, 'Why good practices?', 'In vel ante sit amet metus condimentum bibendum. Curabitur ut turpis mi. Maecenas urna est, convallis eget efficitur eu, cursus a lectus. Nulla malesuada, ligula vitae pharetra iaculis...', 'song-eight.png', 'song-three.mp4', 449, 1);
-- INSERT into `content` (`id`, `user_id`, `channel_id`, `title`, `description`, `media_file`, `thumbnail`, `likes`, `dislikes`) VALUES (5, 1, 1, 'How to start programming?', 'Maecenas efficitur faucibus consectetur. Cras non sapien ac mi viverra rhoncus. Sed ornare, diam sit amet vulputate iaculis, dui elit fringilla diam, sit amet dignissim nibh nisl tristique dolor.', 'song-four.jpg', 'song-two.mp4', 3, 4);

--
-- channels
--
INSERT into `channels` (`id`, `user_id`, `title`, `description`, `image`, `content`, `subscribers`) VALUES (1, 1, 'Stock Footages', 'Royalty free stock footages', 'daniele-franchi.jpg', '1', '0');
-- INSERT into `channels` (`id`, `user_id`, `title`, `description`, `image`, `content`, `subscribers`) VALUES (5, 28, 'Lorem Ipsum 12', 'Donec iaculis, magna at luctus vestibulum, mauris libero feugiat eros, in euismod lorem erat et sem. Mauris iaculis commodo tortor eget accumsan. Cras at orci diam.', 'channel-five.jpg', '0', '0');
-- INSERT into `channels` (`id`, `user_id`, `title`, `description`, `image`, `content`, `subscribers`) VALUES (4, 28, 'Lorem Ipsum 123', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tellus orci, aliquam a blandit id, dictum ac nisl. In congue odio quis lorem egestas feugiat nec in ex. Praesent et enim commodo, faucibus odio a, elementum nibh. Ut sodales felis a mi posuere sodales et nec nunc. ', 'channel-four.jpg', '0', '4,28');
-- INSERT into `channels` (`id`, `user_id`, `title`, `description`, `image`, `content`, `subscribers`) VALUES (1, 28, 'Lorem Ipsum 1234', 'Lorem ipsum', 'channel-one.png', '1', '0,28');
-- INSERT into `channels` (`id`, `user_id`, `title`, `description`, `image`, `content`, `subscribers`) VALUES (6, 28, 'Lorem Ipsum 12345', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vestibulum nisl vitae ante ultrices, sit amet viverra arcu gravida. Fusce semper ullamcorper diam, et bibendum ligula mattis eu. Fusce imperdiet feugiat auctor. Morbi sit amet rutrum tellus. Quisque eget ultrices velit, vitae vestibulum leo.', 'channel-two.png', '0', '0');
-- INSERT into `channels` (`id`, `user_id`, `title`, `description`, `image`, `content`, `subscribers`) VALUES (7, 35, 'Lorem Ipsum 123456', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in mi nisl. Nam id scelerisque nibh. Etiam elit ante, porta maximus tempor et, dignissim lobortis ex.', 'song-eight.png', '0', '0');

--
-- users
--
INSERT into `users` (`id`, `name`, `email`, `password`, `about`, `image`) VALUES (1, 'John Doe', 'john@doe.com', 'ABcde#12345678', 'Designer', 'matheus-ferrero.jpg');
-- INSERT into `users` (`id`, `name`, `email`, `password`, `about`, `image`) VALUES (28, 'David Muse', 'davidmuse@email.com', 'AB#12345678', 'Artist', 'myImg.png');
-- INSERT into `users` (`id`, `name`, `email`, `password`, `about`, `image`) VALUES (34, 'Mary Doe', 'mary@doe.com', 'ABcde#12345678', 'Musician', 'song-two.png');
-- INSERT into `users` (`id`, `name`, `email`, `password`, `about`, `image`) VALUES (35, 'Harry Doe', 'harry@doe.com', 'AB#12345678', 'Developer', 'user-six.jpg');
-- INSERT into `users` (`id`, `name`, `email`, `password`, `about`, `image`) VALUES (36, 'Susan Doe', 'susan@doe.com', 'AB#12345678', 'Singer', 'hello-world.png');
-- INSERT into `users` (`id`, `name`, `email`, `password`, `about`, `image`) VALUES (37, 'Jerry Doe', 'jerry@doe.com', 'AB#12345678', 'Actor', 'song-one.jpg');