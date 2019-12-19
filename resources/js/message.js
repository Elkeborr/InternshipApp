        const tokenProvider = new Chatkit.TokenProvider({
            url: "https://us1.pusherplatform.io/services/chatkit_token_provider/v1/c8f156bf-ad58-40d1-9b20-e81252eac4ad/token"
          });
          const chatManager = new Chatkit.ChatManager({
            instanceLocator: "v1:us1:c8f156bf-ad58-40d1-9b20-e81252eac4ad",
            userId: "Wesley",
            tokenProvider: tokenProvider
          });
    
          chatManager
            .connect()
            .then(currentUser => {
                currentUser.subscribeToRoomMultipart({
                    roomId: currentUser.rooms[0].id,
                    hooks: {
                        onMessage: message => {
                            // const ul = document.getElementById("message-list");
                            // const li = document.createElement("li");
                            // li.appendChild(
                            //   document.createTextNode(`${message.senderId}: ${
                            //     // We know our message will have a single part with
                            //     // a plain text content because we used
                            //     // sendSimpleMessage. In general we'd have to check
                            //     // the partType here.
                            //     message.parts[0].payload.content
                            //   }`)
                            // );
                            // ul.appendChild(li);
                            console.log(message.parts[0].payload.content);
                            let messageWrapper = $('.messages_wrapper-view');
                            let messageBubble = $('<div />',{
                                class: "messages_bubble message_mine"
                            });
                            let messageText = $('<div />', {
                                class: "message_text"
                            })
                            let messageTextP = $('<p />', {
                                text: message.parts[0].payload.content
                            })
                            messageTextP.appendTo(messageText);
                            messageText.appendTo(messageBubble);
                            messageBubble.appendTo(messageWrapper);
                        }
                    }
                });
    
              const form = document.querySelector(".messages_wrapper-form");
              form.addEventListener("submit", e => {
                e.preventDefault();
                const input = document.querySelector(".message_type");
                currentUser.sendSimpleMessage({
                  text: input.value,
                  roomId: currentUser.rooms[0].id
                });
                input.value = "";
              });
            })
            .catch(error => {
              console.error("error:", error);
            });

