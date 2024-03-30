import google.generativeai as palm

# Configure the API key
palm.configure(api_key="apikey")

defaults = {
  'model': 'models/chat-bison-001',
  'temperature': 0.25,
  'candidate_count': 1,
  'top_k': 40,
  'top_p': 0.95,
}

# Initialize context, examples, and messages
context = ""
examples = []
messages = []

while True:
    user_input = input("Question: ")

    if user_input.lower() == "exit":
        break  # Exit the loop if the user types "exit"

    # Append the user's message to the messages list
    messages.append(user_input)

    # Add a "NEXT REQUEST" message to indicate the next user request
    messages.append("NEXT REQUEST")

    # Generate a response using the chat function
    response = palm.chat(
        **defaults,
        context=context,
        examples=examples,
        messages=messages
    )

    # Get the AI's response to the most recent request
    ai_response = response.last
    print("Answer:", ai_response)

    # Update the context, examples, and messages for the next iteration
    context = response.context
    examples = response.examples
    messages = response.messages
