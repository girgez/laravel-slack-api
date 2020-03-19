<?php

namespace Vluzrmos\SlackApi\Methods;

use Vluzrmos\SlackApi\Contracts\SlackConversation;

class Conversation extends SlackMethod implements SlackConversation
{
    protected $methodsGroup = 'conversations.';

    /**
     * This method archives a channel.
     *
     * @param string $channel Conversation to archive.
     *
     * @return array
     */
    public function archive($channel)
    {
        return $this->method('archive', ['channel' => $channel]);
    }

    /**
     * This method closes a channel.
     *
     * @param string $channel Conversation to close.
     *
     * @return array
     */
    public function close($channel)
    {
        return $this->method('close', ['channel' => $channel]);
    }

    /**
     * This method crate a channel with a given name.
     *
     * @param string $name Name of conversation to create
     *
     * @return array
     */
    public function create($name, $is_private, $user_ids)
    {
        return $this->method('create', compact('name', 'is_private', 'user_ids'));
    }

    /**
     * This method returns a portion of message events from the specified conversation.
     * To read the entire history for a channel, call the method with no `latest` or `oldest` arguments,
     * and then continue paging using the instructions below.
     * @see https://api.slack.com/methods/conversations.history
     *
     * @param string $channel Conversation to fetch history for.
     * @param string $cursor Paginate through collections of data by setting the cursor parameter to a next_cursor attribute returned by a previous request's response_metadata.
     * @param bool $inclusive Include messages with latest or oldest timestamp in results only when either timestamp is specified.
     * @param int $latest End of time range of messages to include in results.
     * @param int $limit The maximum number of items to return.
     * @param int $oldest Start of time range of messages to include in results.
     *
     * @return array
     */
    public function history($channel, $cursor = null, $inclusive = false, $latest = null, $limit = 100, $oldest = 0)
    {
        return $this->method('history', compact('channel', 'cursor', 'inclusive', 'latest', 'limit', 'oldest'), 'get');
    }

    /**
     * This method returns information about a workspace conversations.
     *
     * @see https://api.slack.com/methods/conversations.info
     *
     * @param string $channel Conversation ID to learn more about
     * @param bool $include_locale Set this to true to receive the locale for this conversation.
     * @param bool $include_num_members Set to true to include the member count for the specified conversation.
     *
     * @return array
     */
    public function info($channel, $include_locale = false, $include_num_members = false)
    {
        return $this->method('info', compact('channel', 'include_locale', 'include_num_members'), 'get');
    }

    /**
     * This method is used to invite 1-1000 users to a public or private channel. The calling user must be a member of the channel.
     *
     * @see https://api.slack.com/methods/conversations.invite
     *
     * @param string $channel The ID of the public or private channel to invite user(s) to.
     * @param string $users A comma separated list of user IDs. Up to 1000 users may be listed.
     *
     * @return array
     */
    public function invite($channel, $users)
    {
        return $this->method('invite', compact('channel', 'users'));
    }

    /**
     * This method is used to joins a user to an existing conversation.
     *
     * @see https://api.slack.com/methods/conversations.join
     *
     * @param string $channel ID of conversation to join
     *
     * @return array
     */
    public function join($channel)
    {
        return $this->method('join', ['channel' => $channel]);
    }

    /**
     * This method allows a user to remove another member from a channel.
     *
     * @see https://api.slack.com/methods/conversations.kick
     *
     * @param string $channel ID of conversation to remove user from.
     * @param string $user User ID to be removed.
     *
     * @return array
     */
    public function kick($channel, $user)
    {
        return $this->method('kick', compact('channel', 'user'));
    }

    /**
     * This method makes like a tree and leaves a conversation.
     *
     * @see https://api.slack.com/methods/conversations.leave
     *
     * @param string $channel Conversation to leave
     *
     * @return array
     */
    public function leave($channel)
    {
        return $this->method('leave', ['channel' => $channel]);
    }

    /**
     * Lists all channels in a Slack team.
     *
     * @see https://api.slack.com/methods/conversations.list
     *
     * @param string $cursor Paginate through collections of data by setting the cursor parameter to a next_cursor attribute returned by a previous request's response_metadata.
     * @param bool $exclude_archived Set to true to exclude archived channels from the list
     * @param int $limit The maximum number of items to return. Must be an integer no larger than 1000.
     * @param string $types Mix and match channel types by providing a comma-separated list of any combination of public_channel, private_channel, mpim, im
     *
     * @return array
     */
    public function list($cursor, $exclude_archived = false, $limit = 100, $types = 'public_channel')
    {
        return $this->method('list', compact('cursor', 'exclude_archived', 'limit', 'types'), 'get');
    }

    /**
     * Retrieve members of a conversation.
     * 
     * @see https://api.slack.com/methods/conversations.members
     * 
     * @param int $channel ID of the conversation to retrieve members for.
     * @param int $cursor Paginate through collections of data by setting the cursor parameter to a next_cursor attribute returned by a previous request's response_metadata.
     * @param int $limit The maximum number of items to return.
     * 
     * @return array
     */
    public function members($channel, $cursor, $limit = 100)
    {
        return $this->method('members', compact('channel', 'cursor', 'limit'), 'get');
    }

    /**
     * Opens or resumes a direct message or multi-person direct message.
     * 
     * @see https://api.slack.com/methods/conversations.open
     * 
     * @param string $channel Resume a conversation by supplying an im or mpim's ID. Or provide the users field instead.
     * @param string $return_im Boolean, indicates you want the full IM channel definition in the response.
     * @param string $users Comma separated lists of users.
     * 
     * @return array
     */
    public function open($channel, $return_im, $users)
    {
        return $this->method('open', compact('channel', 'return_im', 'users'));
    }

    /**
     * This method renames a conversation.
     *
     * The only people who can rename a channel are team admins, or the person that originally
     * created the channel. Others will recieve a "not_authorized" error.
     *
     * @see https://api.slack.com/methods/conversations.rename
     *
     * @param string $channel ID of conversation to rename
     * @param  string $name New name for conversation
     *
     * @return array
     */
    public function rename($channel, $name)
    {
        return $this->method('rename', compact('channel', 'name'));
    }

    /**
     * Retrieve a thread of messages posted to a conversation.
     * 
     * @see https://api.slack.com/methods/conversations.replies
     * 
     * @param string $channel Conversation ID to fetch thread from.
     * @param string $ts Unique identifier of a thread's parent message.
     * @param string $cursor Paginate through collections of data by setting the cursor parameter to a next_cursor attribute returned by a previous request's response_metadata.
     * @param bool $inclusive Include messages with latest or oldest timestamp in results only when either timestamp is specified.
     * @param int $latest End of time range of messages to include in results.
     * @param int $limit The maximum number of items to return.
     * @param int $oldest Start of time range of messages to include in results.
     * 
     * @return array
     */
    public function replies($channel, $ts, $cursor, $inclusive = false, $latest = null, $limit = 10, $oldest = 0)
    {
        return $this->method('replies', compact('channel', 'ts', 'cursor', 'inclusive', 'latest', 'limit', 'oldest'), 'get');
    }

    /**
     * This method is used to change the purpose of a conversation. The calling user must be a member of the conversation.
     *
     * @see https://api.slack.com/methods/conversations.setPurpose
     *
     * @param string $channel Conversation to set the purpose of.
     * @param string $purpose A new, specialer purpose
     *
     * @return array
     */
    public function setPurpose($channel, $purpose)
    {
        return $this->method('setPurpose', compact('channel', 'purpose'));
    }

    /**
     * This method is used to change the topic of a conversation. The calling user must be a member of the conversation.
     *
     * @see https://api.slack.com/methods/conversations.setTopic
     *
     * @param string $channel Conversation to set the topic of
     * @param string $topic The new topic string. Does not support formatting or linkification.
     *
     * @return array
     */
    public function setTopic($channel, $topic)
    {
        return $this->method('setPurpose', compact('channel', 'topic'));
    }

    /**
     * This method unarchives a conversation. The calling user is added to the conversation.
     *
     * @see https://api.slack.com/methods/conversations.unarchive
     *
     * @param string $channel ID of conversation to unarchive
     *
     * @return array
     */
    public function unarchive($channel)
    {
        return $this->method('unarchive', compact($channel));
    }

    /**
     * This method returns a list of all channel-like conversations accessible to the user or app tied to the presented token
     * 
     * @see https://api.slack.com/methods/users.conversations
     * 
     * @param string $cursor Paginate through collections of data by setting the cursor parameter to a next_cursor attribute returned by a previous request's response_metadata.
     * @param bool $exclude_archived Set to true to exclude archived channels from the list.
     * @param int $limit The maximum number of items to return.
     * @param string $types Mix and match channel types by providing a comma-separated list of any combination of public_channel, private_channel, mpim, im
     * @param string $user Browse conversations by a specific user ID's membership.
     */
    public function usersConversations($cursor, $exclude_archived, $limit, $types, $user)
    {
        return call_user_func([$this->getApi(), 'get'], $this->methodsGroup . 'users.conversations', compact('cursor', 'exclude_archived', 'limit', 'types', 'user'));
    }
}
