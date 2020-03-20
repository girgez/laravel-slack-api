<?php

namespace Vluzrmos\SlackApi\Contracts;

interface SlackConversation
{
    public function archive($channel);
    public function close($channel);
    public function create($name, $is_private, $user_ids);
    public function history($channel, $inclusive, $limit, $latest, $oldest, $cursor);
    public function info($channel, $include_locale, $include_num_members);
    public function invite($channel, $users);
    public function join($channel);
    public function kick($channel, $user);
    public function leave($channel);
    public function list($types, $exclude_archived, $limit, $cursor);
    public function members($channel, $limit, $cursor);
    public function open($channel, $users, $return_im);
    public function rename($channel, $name);
    public function replies($channel, $ts, $inclusive, $limit, $latest, $oldest, $cursor);
    public function setPurpose($channel, $purpose);
    public function setTopic($channel, $topic);
    public function unarchive($channel);
    public function usersConversations($types, $user, $exclude_archived, $limit, $cursor);
}