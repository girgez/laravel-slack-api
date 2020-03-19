<?php

namespace Vluzrmos\SlackApi\Contracts;

interface SlackConversation
{
    public function archive($channel);
    public function close($channel);
    public function create($name, $is_private, $user_ids);
    public function history($channel, $cursor, $inclusive, $latest, $limit, $oldest);
    public function info($channel, $include_locale, $include_num_members);
    public function invite($channel, $users);
    public function join($channel);
    public function kick($channel, $user);
    public function leave($channel);
    public function list($cursor, $exclude_archived, $limit, $types);
    public function members($channel, $cursor, $limit);
    public function open($channel, $return_im, $users);
    public function rename($channel, $name);
    public function replies($channel, $ts, $cursor, $inclusive, $latest, $limit, $oldest);
    public function setPurpose($channel, $purpose);
    public function setTopic($channel, $topic);
    public function unarchive($channel);
    public function usersConversations($cursor, $exclude_archived, $limit, $types, $user);
}