# Ideas

- Each Moodle Course can integrate a custom chat block.
- Each block allows users to create a conversation with an API.
- The user can switch between multiple language models offered by Anthropic, OpenAI etc.
- Chat history should be preserved unless the user clears the chat.

# Interfaces

- getConversation() -> List of all messages
- request(mnessage) -> Consumes a prompt and therefore extends the conversation
- init() -> Creates a new conversation.
